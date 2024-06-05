<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLoansTable extends Migration
{
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->enum('status', ['pending', 'dipinjam', 'selesai'])->default('pending')->change();
        });
    }

    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'returned'])->default('pending')->change();
        });
    }
}
