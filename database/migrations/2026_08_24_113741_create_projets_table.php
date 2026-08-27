<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projets', function (Blueprint $table) {

            $table->id();

            $table->string('titre');
            $table->string('slug')->unique();

            $table->text('description');

            $table->string('image')->nullable();

            $table->text('technologies')->nullable();

            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('apk_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};