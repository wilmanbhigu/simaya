<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MEselon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_eselon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->integer('pangkat_start_id')->unsigned();
            $table->integer('pangkat_end_id')->unsigned();
        });

        
        Schema::table('m_eselon', function(Blueprint $table) {
            $table->foreign('pangkat_start_id')->references('id')->on('m_golongan');
            $table->foreign('pangkat_end_id')->references('id')->on('m_golongan');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_eselon');
    }
}
