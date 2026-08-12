<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorpusDocumentSeeder extends Seeder
{
    public function run()
    {
        DB::table('corpus_documents')->insert([
            [
                'title' => 'Climate Change Essay',
                'content' => 'Climate change refers to long-term shifts in temperatures and weather patterns. These shifts may be natural, but since the 1800s, human activities have been the main driver of climate change.',
                'source' => 'Demo Corpus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Artificial Intelligence Overview',
                'content' => 'Artificial intelligence is the simulation of human intelligence processes by machines, especially computer systems. These processes include learning, reasoning, and self-correction.',
                'source' => 'Demo Corpus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}