@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.diagnosis')])
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

            <p class="form-control-static">
                {!! trans('common.search-result', ['count' => '<span class="text-danger">'.number_format($entrys->total()).'</span>']) !!}
            </p>

            <table class="table text-middle text-center">
                <colgroup>
                    <col width="15%">
                    <col width="*">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="10%">
                </colgroup>

                <thead>
                <tr class="active">
                    <th class="text-center">주문번호</th>
                    <th class="text-center">차량명</th>
                    <th class="text-center">정비사</th>
                    <th class="text-center">연락처</th>
                    <th class="text-center">잔단 완료일</th>
                    <th class="text-center">수정</th>
                </tr>
                </thead>

                <tbody>

                    @unless(count($entrys) >0)
                    <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                    @endunless

                    @foreach($entrys as $data)

                    <tr>
                        <td class="text-center">
                            <a href="{{ route('bcs.diagnosis.show', $data->id) }}"> {{ $data->getOrderNumber() }}</a>
                        </td>
                        <td class="">
                            {{ $data->getCarFullName() }}
                        </td>
                        <td class="">
                            {{ $data->engineer ?$data->engineer->name : ''}}
                        </td>

                        <td class="">
                            {{ $data->engineer ?$data->engineer->mobile : ''}}
                        </td>

                        <td>
                            {{ $data->diagnosed_at }}
                        </td>
                        <td>
                            <a href="{{ route('bcs.diagnosis.show', $data->id) }}" class="btn btn-default"  data-tooltip="{pos:'top'}" title="상세보기">상세보기</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">

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
