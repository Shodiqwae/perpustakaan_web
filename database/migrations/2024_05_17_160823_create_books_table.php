<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('image_book');
            $table->string('book_code');
            $table->string('book_code');
            $table->string('title');
            $table->string('author')->default('Unknown'); // Tambahkan default value untuk author
            $table->string('slug')->default('default-slug'); // Tambahkan default value untuk slug
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
