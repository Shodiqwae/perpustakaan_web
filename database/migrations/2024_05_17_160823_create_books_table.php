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
            $table->string('title');
            $table->string('author')->default('Unknown');
            $table->string('slug')->default('default-slug');
            $table->text('description')->nullable(); // Menambahkan kolom description
            $table->integer('stock')->default(0); // Menambahkan kolom stock
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
