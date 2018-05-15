<?php


    /**
    * @SWG\Post(
    *      path="/authentication",
    *      operationId="userAuthentication",
    *      tags={"Login"},
    *      summary="Autentikasi User dan Token",
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
    *               @SWG\Property(property="username", type="string"),
    *               @SWG\Property(property="password", type="string", default="123456"),
    *               required={"nip", "password"}
    *           )
    *       ),
    *     )
    */