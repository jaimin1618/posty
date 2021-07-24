<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}