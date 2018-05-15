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
            /**
             * 1. Input tanggal Terima
             * 2. Input Tanggal Diteruskan
             * 3. Input Tanggal Surat
             * 4. Input Nomor Surat
             * 5. Input Nomor Agenda
             */

            $table->increments('id');

            $table->date('tanggal_terima');
            $table->date('tanggal_kirim');
            $table->date('tanggal_surat');

            $table->string('nomor_surat');
            $table->string('nomor_agenda');

            /**
             * 7. Input Perihal Surat
             * 8. Input Jenis Instansi Pengirim
             * 9. Input Jabatan Pengirim
             * 10. Input Instansi Pengirim
             * 11. Input Alamat Pengirim
             */

            $table->text('perihal');
            $table->integer('id_instansi_pengirim');
            $table->integer('id_jabatan_pengirim');
            $table->integer('id_jenis_instansi');
            $table->text('alamat_pengirim');

            $table->timestamps();
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
