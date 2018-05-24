<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 11:02 AM
 */

/**
 * @SWG\Get(
 *      path="/penerima-surat",
 *      operationId="gerPenerimaSurat",
 *      tags={"Penerima Surat"},
 *      summary="Daftar Penerima Surat",
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
 *      path="/instansi/{instansiId}",
 *      operationId="detailInstansi",
 *      tags={"Instansi"},
 *      summary="Detail Instansi",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="instansiId",
 *           description="ID Instansi",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}