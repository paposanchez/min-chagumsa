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
                    <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 최근 1:1문의
                    <span class="pull-right more-click" data-url="{{ url('post?board_id=3&trs=&tre=&sf=8&s=')}}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <colgroup>
                            <col width="*">
                            <col width="100px">
                        </colgroup>
                        <tbody>
                        @unless(count($lated_inquire) >0)
                            <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                        @endunless

                        @foreach($lated_inquire as $n => $data)
                            <tr>
                                <td class="">
                                    @if($data->is_answered == 1)
                                        <a href="{{ url('/post/'.$data->id.'/edit') }}">[답변완료] {{ $data->subject }}</a>
                                    @else
                                        <a href="{{ url('/post/'.$data->id.'/edit') }}">[답변대기] {{ $data->subject }}</a>
                                    @endif
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

        {{-- 최근 게시물 --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 최근 게시물
                    <span class="pull-right more-click" data-url="{{ url('post')}}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <colgroup>
                            <col width="*">
                            <col width="100px">
                        </colgroup>
                        <tbody>
                        @unless(count($lated_post) >0)
                            <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                        @endunless

                        @foreach($lated_post as $n => $data)
                            <tr>
                                <td class="">
                                    <a href="{{ url('/post/'.$data->id.'/edit') }}">{{ $data->subject }}</a>
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

        {{--최근 정산현황 --}}
        {{--<div class="col-lg-6 col-md-6 col-sm-6">--}}
            {{--<div class="panel panel-primary">--}}
                {{--<div class="panel-heading">--}}
                    {{--<span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 최근 정산현황 <span class="pull-right" data-url="">more <i--}}
                                {{--class="fa fa-fw fa-caret-right text-success"></i></span>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<table class="table">--}}
                        {{--<colgroup>--}}
                            {{--<col width="*">--}}
                            {{--<col width="70px">--}}
                        {{--</colgroup>--}}
                        {{--<tbody>--}}
                        {{--@unless(count($qna) >0)--}}
                            {{--<tr>--}}
                                {{--<td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>--}}
                            {{--</tr>--}}
                        {{--@endunless--}}

                        {{--@foreach($lated_post as $n => $data)--}}
                            {{--<tr>--}}
                                {{--<td class="">--}}
                                    {{--@if($data->is_answered == 1)--}}
                                        {{--{{ $data->subject }}--}}
                                    {{--@else--}}
                                        {{--{{ $data->subject }}--}}
                                    {{--@endif--}}
                                {{--</td>--}}

                                {{--<td class="">--}}
                                    {{--{{ $data->created_at }}--}}
                                    {{--{{ Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{-- 인증서 발급현황 --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 최근 진단 현황
                    <span class="pull-right more-click" data-url="{{ url('diagnosis')}}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <colgroup>
                            <col width="*">
                            <col width="100px">
                        </colgroup>
                        <tbody>
                        @unless(count($lated_diagnosis) >0)
                            <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                        @endunless

                        @foreach($lated_diagnosis as $n => $data)
                            <tr>
                                <td class="">
                                    <a href="{{ url('diagnosis/'.$data->id) }}">{{ $data->getOrderNumber() }}</a>
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

@endsection


@push( 'footer-script' )
<script type="text/javascript">
    $('document').ready(function () {
        $(function () {
            $(".more-click").on("click", function(){
                var link = $(this).data("url");
                if(link){
                    location.href = link;
                }
            });
        });
    });

</script>
@endpush
