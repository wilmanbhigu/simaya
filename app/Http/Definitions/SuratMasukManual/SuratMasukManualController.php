<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 10:51 AM
 */



/**
 * @SWG\Get(
 *      path="/surat-masuk-manual",
 *      operationId="getSuratMasukManual",
 *      tags={"!!WIP!! Surat Masuk Manual"},
 *      summary="Daftar Surat Masuk Manual",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="query",
 *           name="limit",
 *           description="Limit Data",
 *           type="number"
 *       ),
 *       @SWG\Parameter(
 *           in="query",
 *           name="search",
 *           description="Pencarian Data Berdasarkan Nama",
 *           type="string"
 *       ),
 *       @SWG\Parameter(
 *           in="query",
 *           name="page",
 *           description="Halaman Data",
 *           type="number"
 *       ),
 *     )
 */
function index() {}

/**
 * @SWG\Get(
 *      path="/surat-masuk-manual/{suratId}",
 *      operationId="detailSuratMasukManual",
 *      tags={"!!WIP!! Surat Masuk Manual"},
 *      summary="Detail Surat Manual",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="suratId",
 *           description="ID Surat",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}

/**
 * @SWG\Post(
 *      path="/surat-masuk-manual",
 *      operationId="createSuratMasukManual",
 *      tags={"Surat Masuk Manual"},
 *      summary="Buat Jabatan",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="body",
 *           name="body",
 *           description="Isi Request",
 *           required=true,
 *           @SWG\Schema(
 *               type="object",
 *               @SWG\Property(property="tanggal_terima", type="string"),
 *               @SWG\Property(property="tanggal_kirim", type="string"),
 *               @SWG\Property(property="tanggal_surat", type="string"),
 *               @SWG\Property(property="nomor_surat", type="string"),
 *               @SWG\Property(property="nomor_agenda", type="string"),
 *               @SWG\Property(property="perihal", type="string"),
 *               @SWG\Property(property="instansi_pengirim", type="string"),
 *               @SWG\Property(property="jabatan_pengirim", type="string"),
 *               @SWG\Property(property="jenis_instansi", type="string"),
 *               @SWG\Property(property="alamat_pengirim", type="string"),
 *               @SWG\Property(property="klasifikasi", type="string"),
 *               @SWG\Property(property="keamanan_surat", type="string"),
 *               @SWG\Property(property="penerima_surat", type="string"),
 *               @SWG\Property(property="tembusan_surat", type="string"),
 *               @SWG\Property(property="ringkasan_surat", type="string"),
 *               @SWG\Property(property="isi_surat", type="string"),
 *               @SWG\Property(property="file_surat", type="string"),
 *               required={"penerima_surat"}
 *           )
 *       ),
 *     )
 */
/**
 *             'tanggal_terima' => 'required',
'tanggal_kirim' => 'required',
'tanggal_surat' => 'required',
'nomor_surat' => 'required',
//            'nomor_agenda' =>
'perihal' => 'required',
'instansi_pengirim' => 'required', // id
'jabatan_pengirim' => 'required', // id
'jenis_instansi' => 'required', // id
//            'alamat_pengirim'
'klasifikasi' => 'required', // id
'keamanan_surat' => 'required', //id
'penerima_surat' => 'required', //id
//            'tembusan_surat'
//            'ringkasan_surat'
//            'isi_surat'
//            'file_surat' =
 */
function store() {}
