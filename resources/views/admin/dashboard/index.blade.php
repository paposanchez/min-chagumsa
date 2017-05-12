@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        {{-- 최근 문의사항 --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-question-sign"></span> 최근 1:1문의 <span class="pull-right" data-url="">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <colgroup>
                            <col width="*">
                            <col width="70px">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>

                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- 최근 정산현황 --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-question-sign"></span> 최근 정산현황 <span class="pull-right" data-url="">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <colgroup>
                            <col width="*">
                            <col width="70px">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        {{-- 최근 게시물 --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-question-sign"></span> 최근 게시물<span class="pull-right" data-url="">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <colgroup>
                            <col width="*">
                            <col width="70px">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- 인증서 발급현황 --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-question-sign"></span> 인증서 발급현 <span class="pull-right" data-url="">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <colgroup>
                            <col width="*">
                            <col width="70px">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><a href="">[답변대기]자동차점검 문의 드립니다.</a></td>
                            <td>2017.05.12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection


@section( 'footer-script' )
<script type="text/javascript">
    $('document').ready(function () {

    });

</script>
@endsection
