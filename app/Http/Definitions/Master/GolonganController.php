<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 11:05 AM
 */


/**
 * @SWG\Get(
 *      path="/master/golongan",
 *      operationId="getGolongan",
 *      tags={"Golongan"},
 *      summary="Daftar Golongan",
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
 *      path="/master/golongan/{golonganId}",
 *      operationId="detailGolongan",
 *      tags={"Golongan"},
 *      summary="Detail Golongan",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="golonganId",
 *           description="ID Golongan",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}