<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CodeController extends Controller {

    /**
     * @SWG\Get(path="/codes",
     *   tags={"Code"},
     *   summary="코드 목록",
     *   description="코드 목록을 불러옴",
     *   operationId="__invoke",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    function __invoke() {

    }

}