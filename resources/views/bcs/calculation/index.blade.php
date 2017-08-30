@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.order')])
@endsection

@section( 'content' )

    <div class="container-fluid">

    <div class="panel panel-default">

        <div class="panel-heading">
            <span class="panel-title">검색조건</span>

            {{--<div class="panel-heading-controls">--}}

            {{--<div class="checkbox checkbox-slider--b-flat zfp-panel-collapse">--}}
            {{--<label>--}}
            {{--<input type="checkbox" >--}}
            {{--<span></span>--}}
            {{--</label>--}}
            {{--</div>--}}

            {{--</div>--}}
        </div>

        <div class="panel-body">

            <form  method="GET" class="form-horizontal no-margin-bottom" role="form">

                <div class="form-group">
                    <label for="inputBoardId" class="control-label col-sm-3">{{ trans('admin/order.status') }}</label>
                    <div class="col-sm-6">
                        <button class="btn btn-default" name="status_cd" value="107">진단완료</button>
                        <button class="btn btn-default" name="status_cd" value="108">검토중</button>
                        <button class="btn btn-default" name="status_cd" value="109">인증발급완료</button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">{{ trans('admin/order.period') }}</label>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                            <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('common.search.period_start') }}" name='trs' value=''>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                            <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('common.search.period_end') }}" name='tre' value=''>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                    <div class="col-sm-3">
                        {!! Form::select('sf', $search_fields, [], ['class'=>'form-control']) !!}

                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}" name='s' value=''>
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
                            @if($data->technicion)
                                {{ $data->technicion->name }}
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

            {{--<a href="{{ route('order.edit', $data->id) }}" class="btn btn-primary">등록</a>--}}

        </div>

        <div class="col-sm-6 text-right">
            {!! $entrys->render() !!}
        </div>

    </div>

    </div>

@endsection

@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection