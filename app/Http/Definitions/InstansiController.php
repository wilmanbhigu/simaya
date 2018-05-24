<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/24/18
 * Time: 11:30 AM
 */

/**
 * @SWG\Get(
 *      path="/instansi",
 *      operationId="getInstansi",
 *      tags={"Instansi"},
 *      summary="Daftar Instansi",
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
 * @SWG\Post(
 *      path="/instansi",
 *      operationId="createInstansi",
 *      tags={"Instansi"},
 *      summary="Buat Instasi",
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
 *               @SWG\Property(property="nama", type="string"),
 *               required={"nama"}
 *           )
 *       ),
 *     )
 */
function store() {}

/**
 * @SWG\Patch(
 *      path="/instansi/{instansiId}",
 *      operationId="updateInstansi",
 *      tags={"Instansi"},
 *      summary="Update Instansi",
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
 *       @SWG\Parameter(
 *           in="body",
 *           name="body",
 *           description="Isi Request",
 *           required=true,
 *           @SWG\Schema(
 *               type="object",
 *               @SWG\Property(property="nama", type="string"),
 *               required={"nama"}
 *           )
 *       ),
 *     )
 */
function update() {}

/**
 * @SWG\Delete(
 *      path="/instansi/{instansiId}",
 *      operationId="detailInstansi",
 *      tags={"Instansi"},
 *      summary="Delete Instansi",
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
function destroy() {}