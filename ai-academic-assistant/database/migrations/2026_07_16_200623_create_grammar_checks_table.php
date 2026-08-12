<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('grammar_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
    
            $table->text('input_text');
            $table->enum('language', ['en', 'ur'])->default('en');
    
            $table->json('grammar_issues')->nullable();      // list of mistakes
            $table->decimal('plagiarism_score', 5, 2)->nullable();  // e.g. 23.50 (%)
            $table->json('plagiarism_matches')->nullable();  // list of matched sentences
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grammar_checks');
    }
};
