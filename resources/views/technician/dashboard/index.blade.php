
@extends( 'technician.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.dashboard')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="row">

            {{-- 인증서 대기목록 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-question"></span> 인증서 대기 목록 <span class="pull-right more-click" data-url="{{ url("order?status_cd=107") }}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="100px">
                            </colgroup>
                            <tbody>
                            @unless(count($req_order) >0)
                                <tr><td colspan="6" class="no-result">인증서 발급대기 목록이 없습니다.</td></tr>
                            @endunless

                            @foreach($req_order as $n => $data)
                                <tr>
                                    <td class="">
                                        <a href="{{ url("order", [$data->id]) }}">{{ $data->getOrderNumber() }}</a>
                                    </td>

                                    <td class="">
                                        {{--{{ $data->created_at }}--}}
                                        {{ Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- 인증서 발급완료 목록 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-question"></span> 인증서 발급환황 <span class="pull-right more-click" data-url="{{ url("order?status_cd=109") }}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="70px">
                            </colgroup>
                            <tbody>
                            @unless(count($fin_order) >0)
                                <tr><td colspan="6" class="no-result">인증서 발급현황이 없습니다.</td></tr>
                            @endunless

                            @foreach($fin_order as $n => $data)
                                <tr>
                                    <td class="">
                                        <a href="{{ url("order", [$data->id]) }}">{{ $data->getOrderNumber() }}</a>
                                    </td>

                                    <td class="">
                                        {{--{{ $data->created_at }}--}}
                                        {{ Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            {{-- 공지사항 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-question"></span> 공지사항<span class="pull-right more-click" data-url="{{ url("notice") }}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="100px">
                            </colgroup>
                            <tbody>
                            @unless(count($lated_post) >0)
                                <tr><td colspan="6" class="no-result">공지사항이 없습니다.</td></tr>
                            @endunless

                            @foreach($lated_post as $n => $data)
                                <tr>
                                    <td class="">
                                        <a href="{{ url("notice", ['id' => $data->id]) }}">{{ $data->subject }}</a>
                                    </td>

                                    <td class="">
                                        {{--{{ $data->created_at }}--}}
                                        {{ Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            </div>

        </div>

    </div>

@endsection

@section( 'footer-script' )
    <script type="text/javascript">
        $(function () {
            $(".more-click").on("click", function(){
                var link = $(this).data("url");
                if(link){
                    location.href = link;
                }
            });
        });
    </script>
@endsection