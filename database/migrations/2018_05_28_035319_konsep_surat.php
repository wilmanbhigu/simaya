<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KonsepSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsep_surat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // who created this shit, let's use user id for now since i don't fucking know lol
        });

        Schema::table('konsep_surat', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('m_auth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
