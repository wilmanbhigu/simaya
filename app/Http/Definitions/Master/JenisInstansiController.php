<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 11:08 AM
 */

/**
 * @SWG\Get(
 *      path="/master/jenis-instansi",
 *      operationId="getJenisInstansi",
 *      tags={"Jenis Instansi"},
 *      summary="Daftar Jenis Instansi",
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
 *      path="/master/jenis-instansi/{jenisInstansiId}",
 *      operationId="detailJenisInstansi",
 *      tags={"Jenis Instansi"},
 *      summary="Detail Jenis Instansi",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="jenisInstansiId",
 *           description="ID Jenis Instansi",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}