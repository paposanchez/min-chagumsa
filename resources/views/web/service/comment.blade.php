@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

    <div class="row">

        <div class="col-md-12 media-comments margin-vertical">


            <div class='media-comment-title'>

                <h4>
                    {{ trans('web/comment.Comment') }} <span class='text-light text-danger'>29,128</span>

                    <div class="pull-right media-comment-sort">
                        <a href='#' class='comment-sort-recommend'>{{ trans('web/comment.sort_recommend') }}</a> 
                        <a href='#' class='comment-sort-new active'>{{ trans('web/comment.sort_new') }}</a>
                    </div>
                </h4>
            </div>


            <form action="#" method="post" role="form" enctype="multipart/form-data" class="facebook-share-box">
                <div class="share">
                    <div class="arrow"></div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="">
                                <textarea name="message" cols="40" rows="10" id="status_message" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea> 
                            </div>
                        </div>
                        <div class="panel-footer">

                            <div class="row no-margin-bottom">
                                <div class="col-xs-7">

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default"><i class="fa fa-upload"></i> {{ trans('web/comment.attachment') }}</button>
                                    </div>

                                </div>
                                <div class="col-xs-5 text-right">
                                    <input type="submit" name="submit" value="{{ trans('common.button.register') }}" class="btn btn-primary">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>


            <div class="media-list">


                <div class="media" data-json="idx=3893&amp;post_idx=100348&amp;parent=3893&amp;type=O">
                    <div class="media-heading">
                        <img class="media-object" alt="ZLALA" src="http://file.benison.com/webservice/upload/member/20160603/9c46214c6ded6ad16060374504205558535096355fec5f279b19cf58">
                        <div class="writer">ZLALA</div> 
                        <div class="date">2016-06-08 20:23</div>
                        <a href="#comments" class="comment-reply"  data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.reply") }}">{{ trans("web/comment.reply") }}</a>
                        <a href="#comments" class="comment-delete" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.remove") }}">{{ trans("web/comment.remove") }}</a>
                        <a href="#comments" class="comment-report" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.report") }}">{{ trans("web/comment.report") }}</a>
                    </div>
                    <div class="media-body">
                        <div class="media-text">(서울=연합뉴스) 임순현 황재하 기자 = 고(故) 노무현 전 대통령 재임 당시 청와대 위기관리센터장을 지낸 류희인 전 세월호참사특별조사위원회 비상임위원은 김장수 전 국가안보실장이 한 "청와대는 재난 컨트롤타워가 아니다"라는 취지의 발언을 두고 "이해할 수 없다"고 말했다.</div>
                    </div>

                    <div class="media-sub">
                        <div class="media" data-json="idx=3893&amp;post_idx=100348&amp;parent=3893&amp;type=O">
                            <div class="media-heading">
                                <img class="media-object" alt="ZLALA" src="http://file.benison.com/webservice/upload/member/20160603/9c46214c6ded6ad16060374504205558535096355fec5f279b19cf58">
                                <div class="writer">ZLALA</div> 
                                <div class="date">2016-06-08 20:23</div>
                                <a href="#comments" class="comment-delete" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.remove") }}">{{ trans("web/comment.remove") }}</a>
                                <a href="#comments" class="comment-report" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.report") }}">{{ trans("web/comment.report") }}</a>
                            </div>
                            <div class="media-body">
                                <div class="media-text">(서울=연합뉴스) 임순현 황재하 기자 = 고(故) 노무현 전 대통령 재임 당시 청와대 위기관리센터장을 지낸 류희인 전 세월호참사특별조사위원회 비상임위원은 김장수 전 국가안보실장이 한 "청와대는 재난 컨트롤타워가 아니다"라는 취지의 발언을 두고 "이해할 수 없다"고 말했다.</div>
                            </div>
                        </div>
                        <div class="media" data-json="idx=3893&amp;post_idx=100348&amp;parent=3893&amp;type=O">
                            <div class="media-heading">
                                <img class="media-object" alt="ZLALA" src="http://file.benison.com/webservice/upload/member/20160603/9c46214c6ded6ad16060374504205558535096355fec5f279b19cf58">
                                <div class="writer">ZLALA</div> 
                                <div class="date">2016-06-08 20:23</div>
                                <a href="#comments" class="comment-delete" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.remove") }}">{{ trans("web/comment.remove") }}</a>
                                <a href="#comments" class="comment-report" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.report") }}">{{ trans("web/comment.report") }}</a>
                            </div>
                            <div class="media-body">
                                <div class="media-text">(서울=연합뉴스) 임순현 황재하 기자 = 고(故) 노무현 전 대통령 재임 당시 청와대 위기관리센터장을 지낸 류희인 전 세월호참사특별조사위원회 비상임위원은 김장수 전 국가안보실장이 한 "청와대는 재난 컨트롤타워가 아니다"라는 취지의 발언을 두고 "이해할 수 없다"고 말했다.</div>
                            </div>
                        </div>
                        <div class="media" data-json="idx=3893&amp;post_idx=100348&amp;parent=3893&amp;type=O">
                            <div class="media-heading">
                                <img class="media-object" alt="ZLALA" src="http://file.benison.com/webservice/upload/member/20160603/9c46214c6ded6ad16060374504205558535096355fec5f279b19cf58">
                                <div class="writer">ZLALA</div> 
                                <div class="date">2016-06-08 20:23</div>
                                <a href="#comments" class="comment-delete" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.remove") }}">{{ trans("web/comment.remove") }}</a>
                                <a href="#comments" class="comment-report" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.report") }}">{{ trans("web/comment.report") }}</a>
                            </div>
                            <div class="media-body">
                                <div class="media-text">(서울=연합뉴스) 임순현 황재하 기자 = 고(故) 노무현 전 대통령 재임 당시 청와대 위기관리센터장을 지낸 류희인 전 세월호참사특별조사위원회 비상임위원은 김장수 전 국가안보실장이 한 "청와대는 재난 컨트롤타워가 아니다"라는 취지의 발언을 두고 "이해할 수 없다"고 말했다.</div>
                            </div>
                        </div>
                        <div class="media" data-json="idx=3893&amp;post_idx=100348&amp;parent=3893&amp;type=O">
                            <div class="media-heading">
                                <img class="media-object" alt="ZLALA" src="http://file.benison.com/webservice/upload/member/20160603/9c46214c6ded6ad16060374504205558535096355fec5f279b19cf58">
                                <div class="writer">ZLALA</div> 
                                <div class="date">2016-06-08 20:23</div>
                                <a href="#comments" class="comment-delete" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.remove") }}">{{ trans("web/comment.remove") }}</a>
                                <a href="#comments" class="comment-report" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.report") }}">{{ trans("web/comment.report") }}</a>
                            </div>
                            <div class="media-body">
                                <div class="media-text">(서울=연합뉴스) 임순현 황재하 기자 = 고(故) 노무현 전 대통령 재임 당시 청와대 위기관리센터장을 지낸 류희인 전 세월호참사특별조사위원회 비상임위원은 김장수 전 국가안보실장이 한 "청와대는 재난 컨트롤타워가 아니다"라는 취지의 발언을 두고 "이해할 수 없다"고 말했다.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="media" data-json="idx=3893&amp;post_idx=100348&amp;parent=3893&amp;type=O">
                    <div class="media-heading">
                        <img class="media-object" alt="ZLALA Developer" src="http://file.benison.com/webservice/upload/member/20161031/f93402940bcaf7416103168516209089790756439a5125a89fc481fd">
                        <div class="writer">ZLALA Developer</div> 
                        <div class="date">2016-06-08 20:23</div>
                        <a href="#comments" class="comment-reply"  data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.reply") }}">{{ trans("web/comment.reply") }}</a>
                        <a href="#comments" class="comment-delete" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.remove") }}">{{ trans("web/comment.remove") }}</a>
                        <a href="#comments" class="comment-report" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.report") }}">{{ trans("web/comment.report") }}</a>
                    </div>
                    <div class="media-body">
                        <div class="media-text">(서울=연합뉴스) 임순현 황재하 기자 = 고(故) 노무현 전 대통령 재임 당시 청와대 위기관리센터장을 지낸 류희인 전 세월호참사특별조사위원회 비상임위원은 김장수 전 국가안보실장이 한 "청와대는 재난 컨트롤타워가 아니다"라는 취지의 발언을 두고 "이해할 수 없다"고 말했다.</div>
                    </div>
                </div>


                <div class="media" data-json="idx=3893&amp;post_idx=100348&amp;parent=3893&amp;type=O">
                    <div class="media-heading">
                        <img class="media-object" alt="ZLALA Developer" src="http://file.benison.com/webservice/upload/member/20161031/f93402940bcaf7416103168516209089790756439a5125a89fc481fd">
                        <div class="writer">ZLALA Developer</div> 
                        <div class="date">2016-06-08 20:23</div>
                        <a href="#comments" class="comment-reply"  data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.reply") }}">{{ trans("web/comment.reply") }}</a>
                        <a href="#comments" class="comment-delete" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.remove") }}">{{ trans("web/comment.remove") }}</a>
                        <a href="#comments" class="comment-report" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.report") }}">{{ trans("web/comment.report") }}</a>
                    </div>
                    <div class="media-body">
                        <div class="media-text">(서울=연합뉴스) 임순현 황재하 기자 = 고(故) 노무현 전 대통령 재임 당시 청와대 위기관리센터장을 지낸 류희인 전 세월호참사특별조사위원회 비상임위원은 김장수 전 국가안보실장이 한 "청와대는 재난 컨트롤타워가 아니다"라는 취지의 발언을 두고 "이해할 수 없다"고 말했다.</div>
                    </div>
                </div>


                <div class="media" data-json="idx=3893&amp;post_idx=100348&amp;parent=3893&amp;type=O">
                    <div class="media-heading">
                        <img class="media-object" alt="ZLALA Developer" src="http://file.benison.com/webservice/upload/member/20161031/f93402940bcaf7416103168516209089790756439a5125a89fc481fd">
                        <div class="writer">ZLALA Developer</div> 
                        <div class="date">2016-06-08 20:23</div>
                        <a href="#comments" class="comment-reply"  data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.reply") }}">{{ trans("web/comment.reply") }}</a>
                        <a href="#comments" class="comment-delete" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.remove") }}">{{ trans("web/comment.remove") }}</a>
                        <a href="#comments" class="comment-report" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans("web/comment.report") }}">{{ trans("web/comment.report") }}</a>
                    </div>
                    <div class="media-body">
                        <div class="media-text">(서울=연합뉴스) 임순현 황재하 기자 = 고(故) 노무현 전 대통령 재임 당시 청와대 위기관리센터장을 지낸 류희인 전 세월호참사특별조사위원회 비상임위원은 김장수 전 국가안보실장이 한 "청와대는 재난 컨트롤타워가 아니다"라는 취지의 발언을 두고 "이해할 수 없다"고 말했다.</div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>
@endsection
