<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MSatuanKerja extends Migration
{
    
    public function up()
    {
        Schema::create('m_satuan_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->unique();
            $table->string('parent_kode')->nullable();
            $table->string('nama');
            // $table->integer('eselon_id')->unsigned()->nullable();
            $table->string('eselon_kode')->nullable();
        });   

        Schema::table('m_satuan_kerja', function(Blueprint $table) {
            $table->foreign('eselon_kode')->references('kode')->on('m_eselon');
            $table->foreign('kode')->references('username')->on('m_auth');
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_satuan_kerja');
    }
}
