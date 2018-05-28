<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DisposisiSuratMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_surat', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('surat_masuk_id')->nullable(); // Either one of these must be filled
            $table->integer('surat_masuk_manual_id')->nullable();
            $table->string('kode_satker');
            $table->boolean('approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('disposisi_surat_masuk');
    }
}
