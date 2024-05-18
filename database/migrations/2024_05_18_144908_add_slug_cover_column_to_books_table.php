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
        Schema::table('books', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title')->nullable();
        });

        // Populate slug column based on title
        \App\Models\Book::all()->each(function ($book) {
            $book->slug = \Illuminate\Support\Str::slug($book->title);
            $book->save();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
