@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
<div class="container-fluid">

        <div class="panel panel-default">

                <div class="panel-heading">
                        <span class="panel-title">검색조건</span>

                </div>

                <div class="panel-body">

                        <form method="GET" class="form-horizontal no-margin-bottom" role="form">
                                <div class="form-group">
                                        <label class="control-label col-sm-3">{{ trans('admin/order.period') }}</label>

                                        <div class="col-sm-3">
                                                <div class="input-group">
                                                        <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                                        <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                                        placeholder="{{ trans('common.search.period_start') }}" name='trs' value=''>
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                                <div class="input-group">
                                                        <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                                        <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                                        placeholder="{{ trans('common.search.period_end') }}" name='tre' value=''>
                                                </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                                        <div class="col-sm-3">
                                                {!! Form::select('sf', $search_fields, [], ['class'=>'form-control']) !!}

                                        </div>
                                        <div class="col-sm-3">
                                                <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}"
                                                name='s' value=''>
                                        </div>
                                </div>

                                <div class="form-group no-margin-bottom">
                                        <label class="control-label col-sm-3 sr-only">{{ trans('common.search.button') }}</label>
                                        <div class="col-sm-4 col-sm-offset-3">
                                                <button type="submit" class="btn btn-block btn-primary"><i
                                                        class="fa fa-search"></i> {{ trans('common.search.button') }}</button>
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
                                                <col width="15%">
                                                <col width="15%">
                                                <col width="15%">
                                                <col width="8%">
                                                <col width="8%">
                                                <col width="*">
                                        </colgroup>

                                        <thead>
                                                <tr class="active">
                                                        <th class="text-center">상태</th>
                                                        <th class="text-center">주문번호</th>
                                                        <th class="text-center">주문정보</th>
                                                        <th class="text-center">기술사</th>
                                                        <th class="text-center">인증서발급일</th>
                                                        <th class="text-center">인증서만료일</th>
                                                        <th class="text-center">Remarks</th>

                                                </tr>
                                        </thead>

                                        <tbody>


                                                @unless(count($entrys) >0)
                                                <tr>
                                                        <td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>
                                                </tr>
                                                @endunless

                                                @foreach($entrys as $data)

                                                <tr>

                                                        <td>
                                                                <span
                                                                style="width:60px;display:inline-block;"
                                                                class="label

                                                                @if($data->status_cd == 109)
                                                                label-success
                                                                @else
                                                                label-info
                                                                @endif

                                                                ">

                                                                {{ $data->status->display() }}

                                                        </span>
                                                </td>

                                                <td class="text-center">
                                                        {{ $data->getOrderNumber() }}
                                                </td>

                                                <td class="">
                                                        <a href="/user/{{ $data->user_id }}/edit">{{ $data->orderer_name }}</a>
                                                        <br/>
                                                        <small class="text-warning">{{ $data->orderer_mobile }}</small>
                                                </td>



                                                <td class="">
                                                        @if($data->certificates)
                                                        <a href="/user/{{ $data->technician->id }}/edit">{{ $data->technician->name }}</a>
                                                        <br/>
                                                        <small class="text-warning">{{ $data->technician->mobile }}</small>
                                                        @else
                                                        -
                                                        @endif
                                                </td>

                                                <td>
                                                        {{ $data->certificates && $data->certificates->updated_at ? $data->certificates->updated_at->format('m-d H:i') : '-' }}
                                                </td>

                                                <td>
                                                        {{ $data->certificates && $data->certificates->updated_at ? $data->certificates->getExpireDate()->format('Y-m-d H:i') : '-'  }}

                                                        @if($data->certificates)
                                                        <br/>

                                                        @if($data->certificates->isExpired())
                                                        <small class="text-muted">만료됨</small>
                                                        @else
                                                        <small class="text-warning">
                                                                {{ number_format($data->certificates->getCountdown()) }}일 남음
                                                        </small>
                                                        @endif

                                                        @endif

                                                </td>


                                                <td>

                                                        @if($data->status_cd == 107)
                                                        <button data-id="{{ $data->id }}" class="btn btn-danger certificate-assign">인증시작</button>
                                                        @endif

                                                        @if($data->status_cd > 107)
                                                        <a href="{{ route('certificate', $data->id) }}" class="btn btn-primary">미리보기</a>
                                                        @endif

                                                        <a href="/order/{{ $data->id }}" class="btn btn-default">상세보기</a>



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




@push( 'footer-script' )
<script type="text/javascript">
$(function () {

        $(document).on('click', 'certificate-assign', function () {

                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: '/certificate/'+id+'/assign',
                        success: function (data) {


                                location.href = "/certificate/"+id+'/edit';
                        },
                        error: function (data) {

                        },

                })
        });



});
</script>
@endpush
