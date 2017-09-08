@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.calculation')])
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
                                        <label for="inputBoardId" class="control-label col-sm-3">{{ trans('admin/calculation.status') }}</label>
                                        <div class="col-sm-6">
                                                <button class="btn btn-default" name="calculation_state" value="">전체</button>
                                                <button class="btn btn-default" name="calculation_state" value="110">정산대기</button>
                                                <button class="btn btn-default" name="calculation_state" value="111">정산완료</button>
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
                                        <col width="*">
                                        <col width="10%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="12%">
                                </colgroup>

                                <thead>
                                        <tr class="active">
                                                <th class="text-left">주문번호</th>
                                                <th class="text-center">결제금액</th>
                                                <th class="text-center">PG 수수료율</th>
                                                <th class="text-center">보증료</th>
                                                <th class="text-center">공임비용</th>
                                                <th class="text-center">얼라이언스 Com</th>
                                                <th class="text-center">기술사 Com</th>
                                                <th class="text-center">수익</th>
                                                <th class="text-center">상태</th>
                                        </tr>
                                </thead>

                                <tbody>

                                        @unless(count($entrys)>0)
                                        <tr><td colspan="8" class="no-result">{{ trans('common.no-result') }}</td></tr>
                                        @endunless

                                        @foreach($entrys as $data)
                                        <tr>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>

                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                </div>
        </div>
</div>
@endsection



@section( 'footer-script' )
<script type="text/javascript">

</script>
@endsection
