<?php
/**
 * Created by PhpStorm.
 * User: ragasubekti
 * Date: 5/17/18
 * Time: 11:49 AM
 */

/**
 * @SWG\Get(
 *      path="/master/jabatan",
 *      operationId="getJabatan",
 *      tags={"Jabatan"},
 *      summary="Daftar Jabatan",
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
 *      path="/master/jabatan/{jabatanId}",
 *      operationId="detailJabatan",
 *      tags={"Jabatan"},
 *      summary="Detail Jabatan",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="jabatanId",
 *           description="ID Jabatan",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function show() {}



/**
 * @SWG\Post(
 *      path="/master/jabatan",
 *      operationId="createJabatan",
 *      tags={"Jabatan"},
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
 *               @SWG\Property(property="kode", type="string"),
 *               @SWG\Property(property="nama", type="string"),
 *               required={"kode", "nama"}
 *           )
 *       ),
 *     )
 */
function store() {}

/**
 * @SWG\Patch(
 *      path="/master/jabatan/{jabatanId}",
 *      operationId="updateJabatan",
 *      tags={"Jabatan"},
 *      summary="Update Jabatan",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="jabatanId",
 *           description="ID Jabatan",
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
 *               @SWG\Property(property="kode", type="string"),
 *               @SWG\Property(property="nama", type="string"),
 *               required={"kode", "nama"}
 *           )
 *       ),
 *     )
 */
function update() {}

/**
 * @SWG\Delete(
 *      path="/master/jabatan/{jabatanId}",
 *      operationId="detailJabatan",
 *      tags={"Jabatan"},
 *      summary="Delete Jabatan",
 *      @SWG\Response(
 *          response=200,
 *          description="Success"
 *       ),
 *       @SWG\Response(response=400, description="Bad Request"),
 *       @SWG\Parameter(
 *           in="path",
 *           name="jabatanId",
 *           description="ID Jabatan",
 *           type="number",
 *           required=true,
 *       ),
 *     )
 */
function destroy() {}