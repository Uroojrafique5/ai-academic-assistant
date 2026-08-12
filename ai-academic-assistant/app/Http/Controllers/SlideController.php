<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Presentation;

class SlideController extends Controller
{
    // Form dikhane ke liye (GET /slides)
    public function index()
    {
        return view('slides.index');
    }

    // Form submit hone pe ye chalega (POST /slides)
    public function generate(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'num_slides' => 'required|integer|min:3|max:10',
        ]);

        $topic = $request->input('topic');
        $numSlides = $request->input('num_slides');
        $theme = $request->input('theme', 'default');

        // Flask ko call karna (LLM ki wajah se thoda time lag sakta hai)
        $response = Http::timeout(60)->post('http://localhost:5000/generate-slides', [
            'topic' => $topic,
            'num_slides' => $numSlides,
            'theme' => $theme,
        ]);
        $data = $response->json();

        if (!$response->successful() || !isset($data['file_path'])) {
            return back()->with('error', 'Slide generation failed. Please try again.');
        }

        $presentation = Presentation::create([
            'user_id' => auth()->id(),
            'topic' => $topic,
            'num_slides' => $numSlides,
            'theme' => $theme,
            'file_path' => $data['file_path'],
            'slide_content' => $data['slide_content'],
        ]);

        return view('slides.result', [
            'presentation' => $presentation,
        ]);
    }

    // File download karwane ke liye (GET /slides/download/{id})
    public function download($id)
    {
        $presentation = Presentation::findOrFail($id);

        // Flask service se file mangwana
        $flaskFileUrl = 'http://localhost:5000/' . str_replace('\\', '/', $presentation->file_path);

        $response = Http::get($flaskFileUrl);

        if (!$response->successful()) {
            return back()->with('error', 'File not found.');
        }

        $filename = basename($presentation->file_path);

        return response($response->body())
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.presentationml.presentation')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}