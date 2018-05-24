<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 11:12 AM
 */



/**
 * @SWG\Get(
 *      path="/master/klasifikasi-surat",
 *      operationId="getKlasifikasiSurat",
 *      tags={"Klasifikasi Surat"},
 *      summary="Daftar Klasifikasi Surat",
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
 *      path="/master/klasifikasi-surat/{klasifikasiSuratId}",
 *      operationId="detailKeamananSurat",
 *      tags={"Klasifikasi Surat"},
 *      summary="Detail Klasifikasi Surat",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="klasifikasiSuratId",
 *           description="ID klasifikasi Surat",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}