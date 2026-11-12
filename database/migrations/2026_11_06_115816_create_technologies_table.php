<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->default('backend'); // backend, frontend, mobile, database, devops, security, ai
            $table->string('category_label_id')->default('Backend & Core API');
            $table->string('category_label_en')->default('Backend & Core API');
            $table->string('version')->nullable(); // e.g. "v11.x • PHP 8.3+"
            $table->string('role')->nullable(); // e.g. "Enterprise Web & ERP Core"
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->string('image')->nullable(); // Logo / badge image url or uploaded path
            $table->json('features')->nullable(); // Tags / keywords
            $table->text('use_case')->nullable(); // Where it is deployed
            $table->string('performance_metric')->nullable(); // e.g. "< 45ms P99 Latency"
            $table->string('official_url')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
