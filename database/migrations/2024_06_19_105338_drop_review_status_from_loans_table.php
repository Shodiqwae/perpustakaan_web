<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropReviewStatusFromLoansTable extends Migration
{
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('review_status');
        });
    }

    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->boolean('review_status')->default(false)->after('status');
        });
    }
}
