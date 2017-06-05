<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
/**
 * @SWG\Swagger(
 *   basePath="/",
 *   @SWG\Info(
 *     title="CARGUMSA API",
 *     version="1.0.0"
 *   ),
 *   @SWG\Definition(
 *         definition="Error",
 *         required={"status", "msg"},
 *         @SWG\Property(
 *             property="status",
 *             type="string"
 *         ),
 *         @SWG\Property(
 *             property="msg",
 *             type="string"
 *         ),
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="data",
 *             type="array|object"
 *         )
 *     ),
 * 
 * )
 */
use App\Exceptions\ApiHandler;

class ApiController extends Controller {

}
