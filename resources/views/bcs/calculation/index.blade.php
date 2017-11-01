@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.order')])
@endsection

@section( 'content' )

    <div class="container-fluid">

    <div class="panel panel-default">

        <div class="panel-heading">
            <span class="panel-title">검색조건</span>
        </div>

        <div class="panel-body">

            <form  method="GET" class="form-horizontal no-margin-bottom" role="form">

                <div class="form-group">
                    <label for="inputBoardId" class="control-label col-sm-3">{{ trans('admin/order.status') }}</label>
                    <div class="col-sm-9">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }} selected_cd">
                                {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }} 전체
                            </label>
                            <label class="btn btn-default {{ $status_cd == 107 ? 'active' : '' }} selected_cd">
                                {{ Form::radio('status_cd', 107, \App\Helpers\Helper::isCheckd(107, $status_cd), ['name' => 'status_cd']) }} 진단완료
                            </label>
                            <label class="btn btn-default {{ $status_cd == 108 ? 'active' : '' }} selected_cd">
                                {{ Form::radio('status_cd', 108, \App\Helpers\Helper::isCheckd(108, $status_cd), ['name' => 'status_cd']) }} 검토중
                            </label>
                            <label class="btn btn-default {{ $status_cd == 109 ? 'active' : '' }} selected_cd">
                                {{ Form::radio('status_cd', 109, \App\Helpers\Helper::isCheckd(109, $status_cd), ['name' => 'status_cd']) }} 인증발급완료
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">{{ trans('admin/order.period') }}</label>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                            <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('common.search.period_start') }}" name='trs' value='{{ $trs }}'>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                            <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('common.search.period_end') }}" name='tre' value='{{ $tre }}'>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                    <div class="col-sm-3">
                        {!! Form::select('sf', $search_fields, $sf, ['class'=>'form-control']) !!}

                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}" name='s' value='{{ $s }}'>
                    </div>
                </div>

                <div class="form-group no-margin-bottom">
                    <label class="control-label col-sm-3 sr-only">{{ trans('common.search.button') }}</label>
                    <div class="col-sm-4 col-sm-offset-3">
                        <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> {{ trans('common.search.button') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row margin-bottom">

        <div class="col-md-12">

            <h1>미정산 목록</h1>

            <table class="table text-middle table-bordered text-center">
                <colgroup>
                    <col width="10%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="*">
                </colgroup>

                <thead>
                <tr class="active">
                    <th class="text-center">주문번호</th>
                    <th class="text-center">주문자</th>
                    <th class="text-center">연락처</th>
                    <th class="text-center">정비사</th>
                    <th class="text-center">기술사</th>
                    <th class="text-center">상태</th>
                    <th class="text-center">정산처리/정산요청</th>
                </tr>
                </thead>

                <tbody>

                @unless(count($entrys) >0)
                    <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                @endunless

                @foreach($entrys as $data)

                    <tr>
                        <td class="text-center">
                            <a href="{{ url("order", [$data->id]) }}">{{ $data->getOrderNumber() }}</a>
                        </td>
                        <td class="">
                            {{ $data->orderer_name }}
                        </td>
                        <td class="">
                            {{ $data->orderer_mobile }}
                        </td>

                        <td class="">
                            @if($data->engineer)
                                {{ $data->engineer->name }}
                            @endif
                        </td>

                        <td class="">
                            @if($data->technician)
                                {{ $data->technician->name }}
                            @endif
                        </td>

                        <td>
                            {{ $data->status->display() }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger settlement-request" data-id="">정산요청</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <
    </div>


    <div class="row">

        <div class="col-sm-6">
        </div>

        <div class="col-sm-offset-6 col-sm-6 text-right">
            {!! $entrys->render() !!}
        </div>

    </div>

    </div>

@endsection

@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection
