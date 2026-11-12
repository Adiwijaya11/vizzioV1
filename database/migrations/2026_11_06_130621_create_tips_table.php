<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tips', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('performance'); // performance, security, architecture, product, seo, database
            $table->string('badge')->nullable(); // e.g. "PERFORMA & WEB VITALS"
            $table->text('summary');
            $table->text('summary_en')->nullable();
            $table->json('steps'); // List of actionable checklist steps
            $table->string('outcome')->nullable(); // Technical outcome / SLA result
            $table->string('outcome_en')->nullable();
            $table->string('read_time')->default('4 Menit Baca');
            $table->integer('order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tips');
    }
};
