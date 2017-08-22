
@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="row">

            {{-- 최근 문의사항 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-question"></span> 최근 1:1문의 <span class="pull-right" data-url="">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="100px">
                            </colgroup>
                            <tbody>
                            @unless(count($qna) >0)
                                <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                            @endunless

                            @foreach($qna as $n => $data)
                                <tr>
                                    <td class="">
                                        @if($data->is_answered == 1)
                                            [답변완료] {{ $data->subject }}
                                        @else
                                            [답변대기] {{ $data->subject }}
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

            {{-- 최근 정산현황 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-question"></span> 최근 정산현황 <span class="pull-right" data-url="">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="70px">
                            </colgroup>
                            <tbody>
                            @unless(count($qna) >0)
                                <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                            @endunless

                            @foreach($lated_post as $n => $data)
                                <tr>
                                    <td class="">
                                        @if($data->is_answered == 1)
                                            {{ $data->subject }}
                                        @else
                                            {{ $data->subject }}
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

        </div>


        <div class="row">
            {{-- 최근 게시물 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-question"></span> 최근 게시물<span class="pull-right" data-url="">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="100px">
                            </colgroup>
                            <tbody>
                            @unless(count($qna) >0)
                                <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                            @endunless

                            @foreach($lated_post as $n => $data)
                                <tr>
                                    <td class="">
                                        @if($data->is_answered == 1)
                                            {{ $data->subject }}
                                        @else
                                            {{ $data->subject }}
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

            {{-- 인증서 발급현황 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-question"></span> 인증서 발급현 <span class="pull-right" data-url="">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="70px">
                            </colgroup>
                            <tbody>
                            @unless(count($qna) >0)
                                <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                            @endunless

                            @foreach($lated_post as $n => $data)
                                <tr>
                                    <td class="">
                                        @if($data->is_answered == 1)
                                            {{ $data->subject }}
                                        @else
                                            {{ $data->subject }}
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

        </div>

    </div>

@endsection

@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection