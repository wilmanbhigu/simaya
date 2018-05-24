<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 11:11 AM
 */



/**
 * @SWG\Get(
 *      path="/master/kecamatan",
 *      operationId="getKecamatan",
 *      tags={"Kecamatan"},
 *      summary="Daftar Kecamatan",
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
 *      path="/master/kecamatan/{kecamatanId}",
 *      operationId="detailKecamatan",
 *      tags={"Kecamatan"},
 *      summary="Detail Kecamatan",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="kecamatanId",
 *           description="ID Kecamatan",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}