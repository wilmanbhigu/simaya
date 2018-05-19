<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/19/18
 * Time: 1:09 PM
 */

/**
 * @SWG\Get(
 *      path="/master/agama",
 *      operationId="getAgama",
 *      tags={"Agama"},
 *      summary="Daftar Agama",
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
 *      path="/master/agama/{agamaId}",
 *      operationId="detailAgama",
 *      tags={"Agama"},
 *      summary="Detail Agama",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="agamaId",
 *           description="ID Agama",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}