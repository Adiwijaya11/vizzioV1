<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Services Table
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('price');
            $table->string('category')->default('Engineering');
            $table->text('description')->nullable();
            $table->string('icon')->default('code');
            $table->json('features')->nullable();
            $table->string('badge')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // 2. Team Members Table
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('dept')->default('Engineering');
            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->string('tag')->nullable();
            $table->string('email')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // 3. Testimonials Table
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('company');
            $table->string('project')->nullable();
            $table->tinyInteger('rating')->default(5);
            $table->text('comment');
            $table->string('date')->nullable();
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamps();
        });

        // 4. News Articles Table
        Schema::create('news_articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category')->default('tech');
            $table->string('category_label_id')->default('Teknologi');
            $table->string('category_label_en')->default('Tech');
            $table->string('title_id');
            $table->string('title_en')->nullable();
            $table->text('desc_id')->nullable();
            $table->text('desc_en')->nullable();
            $table->longText('content_id')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->default('cpu');
            $table->integer('views')->default(0);
            $table->date('published_at')->nullable();
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_articles');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('services');
    }
};
