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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('plan', ['free', 'pro'])->default('free');
    
            // Har module ke usage counters
            $table->integer('grammar_checks_used')->default(0);
            $table->integer('grammar_checks_limit')->default(10);
    
            $table->integer('summaries_used')->default(0);
            $table->integer('summaries_limit')->default(5);
    
            $table->integer('slides_used')->default(0);
            $table->integer('slides_limit')->default(3);
    
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
