<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 11:04 AM
 */

/**
 * @SWG\Get(
 *      path="/master/eselon",
 *      operationId="getEselon",
 *      tags={"Eselon"},
 *      summary="Daftar Eselon",
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
 *      path="/master/eselon/{eselonId}",
 *      operationId="detailEselon",
 *      tags={"Eselon"},
 *      summary="Detail Eselon",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="eselonId",
 *           description="ID Eselon",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}