<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 18.
 * Time: PM 5:05
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

class CommunityController extends Controller
{
    /**
     * @SWG\Get(path="/community/notice/{notice_id}/{page}/{num_notice}",
     *   tags={"Community"},
     *   summary="고객센터 - 공지사항 리스트",
     *   description="공지사항의 글 목록 출력",
     *   operationId="noticeList",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="notice_id",
     *     description="Notice Id",
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
     *   @SWG\Parameter(
     *     in="path",
     *     name="num_notice",
     *     description="Notice number of a request",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function noticeList($notice_id, $page = 1, $num_notice = 10){

    }

    /**
     * @SWG\Get(path="/community/notice/view/{notice_id}",
     *   tags={"Community"},
     *   summary="상세보기",
     *   description="공지사항 상세보기",
     *   operationId="noticeDetail",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="notice_id",
     *     description="Notice Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function noticeDetail($notice_id){

    }

    /**
     * @SWG\Get(path="/community/faq/{categori_id}/{faq_id}/{page}/{num_faq}",
     *   tags={"Community"},
     *   summary="고객센터 - FAQ 리스트",
     *   description="FAQ 글 목록 출력",
     *   operationId="faqList",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="category_id",
     *     description="Category Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="faq_id",
     *     description="Faq Id",
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
     *   @SWG\Parameter(
     *     in="path",
     *     name="num_faq",
     *     description="Faq number of a request",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function faqList($categori_id, $faq_id, $page =1, $num_faq){

    }

    /**
     * @SWG\Get(path="/community/faq/view/{faq_id}",
     *   tags={"Community"},
     *   summary="상세보기",
     *   description="FAQ 상세보기",
     *   operationId="faqDeatail",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="faq_id",
     *     description="Faq Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function faqDeatail($faq_id){

    }

    /**
     * @SWG\Get(path="/community/inquire/{inquire_id}/{page}/{num_inquire}",
     *   tags={"Community"},
     *   summary="고객센터 - 1:1 문의하기 리스트",
     *   description="1:1 문의 글 목록 출력",
     *   operationId="inquireList",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="inquire_id",
     *     description="Inquire Id",
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
     *   @SWG\Parameter(
     *     in="path",
     *     name="inquire_faq",
     *     description="Inquire number of a request",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function inquireList($inquire_id, $page = 1, $num_inquire){

    }

    /**
     * @SWG\Get(path="/community/inquire/view/{inquire_id}",
     *   tags={"Community"},
     *   summary="상세보기",
     *   description="1:1 문의 상세보기",
     *   operationId="inquireDetail",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="inquire_id",
     *     description="Inquire Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function inquireDetail($inquire_id){

    }

    /**
     * @SWG\Put(path="/community/inquire/write",
     *   tags={"Community"},
     *   summary="문의하기",
     *   description="1:1 문의하기",
     *   operationId="sendInquire",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="post",
     *     description="Inquire Context",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/Post")
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function sendInquire(){

    }

}