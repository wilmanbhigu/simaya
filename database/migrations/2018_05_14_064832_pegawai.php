<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nip')->unique();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->integer('satuan_kerja_id')->unsigned();
            $table->integer('jabatan_id')->unsigned();
            $table->integer('golongan_id')->unsigned();
            $table->integer('status_kepegawaian_id')->unsigned()->nullable();
            $table->string('alamat');
            $table->string('no_telp');
            $table->integer('golongan_darah_id')->unsigned();
            $table->integer('agama_id')->unsigned();
            $table->integer('jenis_kelamin');
            $table->integer('umur_pensiun')->default(60);
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::table('pegawai', function(Blueprint $table) {
            $table->foreign('satuan_kerja_id')->references('id')->on('m_satuan_kerja');
            $table->foreign('jabatan_id')->references('id')->on('m_jabatan');
            $table->foreign('golongan_id')->references('id')->on('m_golongan');
            $table->foreign('status_kepegawaian_id')->references('id')->on('m_status_kepegawaian');
            $table->foreign('golongan_darah_id')->references('id')->on('m_golongan_darah');
            $table->foreign('agama_id')->references('id')->on('m_agama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
