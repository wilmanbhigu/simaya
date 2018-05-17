<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratMasukManual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk_manual', function(Blueprint $table) {

            $table->increments('id');

            $table->date('tanggal_terima');
            $table->date('tanggal_kirim');
            $table->date('tanggal_surat');

            $table->string('nomor_surat');
            $table->string('nomor_agenda');

            $table->text('perihal');
            $table->integer('instansi_pengirim_id')->unsigned();
            $table->integer('jabatan_pengirim_id')->unsigned();
            $table->integer('jenis_instansi_id')->unsigned();
            $table->text('alamat_pengirim');

            $table->integer('klasifikasi_id')->unsigned();
            $table->integer('keamanan_surat_id')->unsigned();
            $table->integer('penerima_surat_id')->unsigned();
            $table->integer('tembusan_surat_id')->unsigned()->nullable();

            $table->text('ringkasan_surat')->nullable();
            $table->text('isi_surat')->nullable();
            $table->string('file_surat');

            $table->timestamps();
        });

        Schema::table('surat_masuk_manual', function(Blueprint $table) {
            $table->foreign('instansi_pengirim_id')->references('id')->on('instansi');
            $table->foreign('jabatan_pengirim_id')->references('id')->on('m_jabatan');
            $table->foreign('jenis_instansi_id')->references('id')->on('m_jenis_instansi');

            $table->foreign('klasifikasi_id')->references('id')->on('m_klasifikasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk_manual');
    }
}
