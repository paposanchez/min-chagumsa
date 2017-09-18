@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.calculation')])
@endsection

@section( 'content' )
<div class="container-fluid">

        <div class="panel panel-default">

                <div class="panel-heading">
                        <span class="panel-title">검색조건</span>

                        <div class="panel-heading-controls">

                                <div class="checkbox checkbox-slider--b-flat zfp-panel-collapse">
                                        <label>
                                                <input type="checkbox" >
                                                <span></span>
                                        </label>
                                </div>

                        </div>
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
                                        <div class="col-sm-6">
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

                                        <col width="8%">
                                        <col width="*">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="10%">

                                </colgroup>

                                <thead>
                                        <tr class="active">
                                                <th class="text-center">#</th>
                                                <th class="text-left">상품명</th>
                                                <th class="text-center">가격</th>
                                                <th class="text-center">PG 수수료율</th>
                                                <th class="text-center">보증료</th>
                                                <th class="text-center">공임비용</th>
                                                <th class="text-center">얼라이언스 Com</th>
                                                <th class="text-center">기술사 Com</th>
                                                <th class="text-center">수익</th>
                                                <th class="text-center">Remarks</th>
                                        </tr>
                                </thead>

                                <tbody>

                                        @unless(count($entrys)>0)
                                        <tr><td colspan="10" class="no-result">{{ trans('common.no-result') }}</td></tr>
                                        @endunless

                                        @foreach($entrys as $data)
                                        <tr>
                                                <td class=""><a href="/item/{{ $data->id }}/show">{{ $data->id }}</a></td>
                                                <td class="text-left">{{ $data->name}}</td>
                                                <td class=""><i class="fa fa-won"></i>{{ number_format($data->price) }}</td>
                                                <!-- <td class="">{{ $data->car_sort }}</td> -->
                                                <td class="">{{ $data->commission}}%</td>
                                                <td class=""><i class="fa fa-won"></i>{{ number_format($data->guarantee) }}</td>
                                                <td class=""><i class="fa fa-won"></i>{{ number_format($data->wage) }}</td>

                                                <td class="">{{ $data->alliance_ratio }}%</td>
                                                <td class="">{{ $data->certi_ratio }}%</td>
                                                <td class="">{{ $data->self_ratio }}%</td>


                                                <td>
                                                        <a href="{{ route('item.show', $data->id) }}" class="btn btn-default">상세보기</a>
                                                </td>

                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                </div>
        </div>


        <div class="row">

                <div class="col-sm-6">

                        {{--<a href="" class="btn btn-primary">등록</a>--}}

                </div>

                <div class="col-sm-6 text-right">

                </div>

        </div>

</div>
@endsection



@section( 'footer-script' )
<script type="text/javascript">

</script>
@endsection
