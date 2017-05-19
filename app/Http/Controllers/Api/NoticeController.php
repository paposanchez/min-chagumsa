<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Board;

class NoticeController extends Controller
{

    /**
     * @SWG\Get(path="/notice",
     *   tags={"Notice"},
     *   summary="공지사항 목록",
     *   description="공지사항 목록 출력",
     *   operationId="calculationList",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="category_cd",
     *     description="Category Cd",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="page",
     *     description="Page Number",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function index($category_cd, $page = 1){
        return $notice_list = Board::where('use_category', $category_cd)->json();
    }


    /**
     * @SWG\Get(path="/notice/{notice_id}",
     *   tags={"Notice"},
     *   summary="공지사항 상세내용",
     *   description="공지사항 상세내용 출력",
     *   operationId="show",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="notice_id",
     *     description="Notice ID",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="category_cd",
     *     description="Category Cd",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function show($notice_id, $category_cd){
        return $notice_list = Board::where('id', $notice_id)->where('use_category', $category_cd);
    }

}