<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 11:10 AM
 */


/**
 * @SWG\Get(
 *      path="/master/keamanan-surat",
 *      operationId="getKeamananSurat",
 *      tags={"Keamanan Surat"},
 *      summary="Daftar Keamanan Surat",
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
 *      path="/master/keamanan-surat/{keamananSuratId}",
 *      operationId="detailKeamananSurat",
 *      tags={"Keamanan Surat"},
 *      summary="Detail Keamanan Surat",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="keamananSuratId",
 *           description="ID Keamanan Surat",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}