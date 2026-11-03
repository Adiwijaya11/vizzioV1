<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('type')->default('workshop');
            $table->string('format')->default('offline');
            $table->string('location')->nullable();
            $table->string('location_url')->nullable();
            $table->date('event_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('organizer')->default('VizzioCraft');
            $table->string('speaker')->nullable();
            $table->unsignedInteger('capacity')->nullable();
            $table->unsignedInteger('registered')->default(0);
            $table->decimal('price', 12, 0)->default(0);
            $table->string('registration_url')->nullable();
            $table->string('status')->default('upcoming');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->json('tags')->nullable();
            $table->timestamps();

            $table->index('event_date');
            $table->index('type');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
