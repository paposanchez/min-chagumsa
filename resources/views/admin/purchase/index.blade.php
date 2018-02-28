@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>결제관리
                        <small>총 <strong class="text-primary">{{ number_format($entrys->total()) }}</strong>개의 검색결과가
                            있습니다.
                        </small>
                    </h2>
                </div>

                <div class="card-body">

                    <ul class="tab-nav" role="tablist">
                        <li role="presentation" class="active">
                            <a class="col-sx-4" href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab"
                               aria-expanded="true">
                                검색목록
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a class="col-xs-4" href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab"
                               aria-expanded="false">
                                검색하기
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content p-t-0 p-b-20 p-r-0 p-l-0">

                        <div role="tabpanel" class="tab-pane animated fadeIn active" id="tab-1">
                            <table class="table text-center">
                                <colgroup>
                                    <col width="8%">
                                    <col width="20%" class="">
                                    <col width="10%" class="">
                                    <col width="10%" class="">
                                    <col width="10%">
                                    <col width="20%">
                                    <col width="15%">
                                    <col width="*">
                                </colgroup>

                                <thead>
                                <tr class="">
                                    <th class="text-center">상태</th>
                                    <th class="text-center">주문번호</th>
                                    <th class="text-center">결제번호</th>
                                    <th class="text-center">결제방법</th>
                                    <th class="text-center">결제금액</th>
                                    <th class="text-center">PG</th>
                                    <th class="text-center">결제일</th>
                                    <th class="text-center">Remarks</th>
                                </tr>
                                </thead>


                                <tbody>

                                @unless(count($entrys) >0)
                                    <tr>
                                        <td colspan="8" class="no-result">{{ trans('common.no-result') }}</td>
                                    </tr>
                                @endunless

                                @foreach ($entrys as $key => $data)
                                    <tr>
                                        <td class="text-center">
                                            @component('components.badge', [
                                            'code' => $data->status_cd,
                                            'color' =>[
                                            '100' => 'default',
                                            '102' => 'success',
                                            '112' => 'success',
                                            '113' => 'warning',
                                            '114' => 'info',
                                            '115' => 'primary',
                                            '116' => 'danger'
                                            ]])
                                                {{ $data->status->display() }}
                                            @endcomponent
                                        </td>

                                        <td>
                                            {{ $data->order->chakey }}
                                            <br>
                                            <small class="text-info">{{ $data->order->id }}</small>
                                        </td>
                                        <td>{{ $data->id }}</td>


                                        <td>{{ $data->payment_type->display() }}</td>

                                        <td>{{ $data->amount }}</td>

                                        <td>{{ $data->pg ? $data->pg : '-' }}</td>

                                        <td class="text-center">{{ $data->updated_at }}</td>

                                        <td class="text-center">

                                            <a href="#"
                                               class="btn btn-default btn-icon waves-effect waves-float detail"
                                               data-toggle="modal"
                                               data-target="#detailModal" data-id="{{ $data->id }}"
                                               title="결제정보 상세보기"><i class="zmdi zmdi-search-in-page"></i></a>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            {{--page navigation--}}
                            {!! $entrys->appends(['sf' => $sf, 's' => $s, 'trs' => $trs, 'tre' => $tre, 'sort' => $sort, 'sort_orderby' => $sort_orderby])->render() !!}
                        </div>

                        <div role="tabpanel" class="tab-pane animated fadeIn m-t-20" id="tab-2">
                            <form method="GET" class="form-horizontal" role="form" id="searchFormCollapse">
                                <input type="hidden" name="sort" id="sort_val" value="{{ $sort }}">
                                <input type="hidden" name="sort_orderby" id="sort_orderby" value="{{ $sort_orderby }}">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">상태</label>

                                    <div class="col-sm-9">

                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }}
                                                전체
                                            </label>
                                            <label class="btn btn-default {{ $status_cd == 100 ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', 100, \App\Helpers\Helper::isCheckd(100, $status_cd), ['name' => 'status_cd']) }}
                                                주문취소
                                            </label>
                                            <label class="btn btn-default {{ $status_cd == 102 ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', 102, \App\Helpers\Helper::isCheckd(102, $status_cd), ['name' => 'status_cd']) }}
                                                주문완료
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control input-mask date-picker" name='trs'
                                               value='{{ $trs }}' data-mask="0000-00-00" placeholder="시작일"
                                               autocomplete="off" maxlength="10">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control input-mask date-picker" name='tre'
                                               value='{{ $tre }}' data-mask="0000-00-00" placeholder="종료일"
                                               autocomplete="off" maxlength="10">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색어</label>

                                    <div class="col-sm-4">
                                        {!! Form::select('sf', $search_fields, $sf, ['class'=>'selectpicker']) !!}
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="s" name="s"
                                               placeholder="검색어" value="{{ $s }}">
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">검색</button>
                                    </div>
                                </div>


                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- Purchase Modal -->
    <div id="detailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="card">
                    <div class="card-header bgm-blue m-b-20">
                        <h2>결제 상세내용
                            <small></small>
                        </h2>
                        <ul class="actions actions-alt">
                            <li class="dropdown">
                                <a href="#">
                                    <i class="zmdi zmdi-close" data-dismiss="modal"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body card-padding">
                        {!! Form::open(['method' => 'PATCH','route' => ['purchase.update', 'id' => 0], 'class'=>'form-horizontal', 'id'=>'carForm', 'enctype'=>"multipart/form-data"]) !!}
                        <input type="hidden" name="purchase_id" id="purchase_id" value="">
                        <div class="modal-body">
                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">결제 상태</label>
                                <br>
                                <span class="label form-control-static" id="status_cd"></span>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">결제 seq</label>
                                <p class="form-control-static" id="id"></p>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">결제타입</label>
                                <p class="form-control-static" id="type"></p>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">결제 금액</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="결제 금액을 입력해주세요." required>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">예금주</label>
                                <input type="text" class="form-control" id="refund_name" name="refund_name" placeholder="예금주를 입력해주세요." minlength="3" required>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">예금 은행</label>
                                <input type="text" class="form-control" id="refund_bank" name="refund_bank" placeholder="ex) 국민, 우리, 카카오 등" required>

                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">예금 계좌번호</label>
                                <input type="text" class="form-control" id="refund_account" name="refund_account" placeholder="ex) 1234-1234-1234" required>
                                {{--<small></small>--}}
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="">변경</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push( 'footer-script' )
    <script type="text/javascript">
        $(document).on('click', '.detail', function () {
            var id = $(this).data('id');
            var html = '';
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/purchase/get-detail',
                data: {
                    'id': id
                },
                success: function (data) {
                    $('#purchase_id').val(id);
                    $.each(data, function(key, value){
                        if(key == 'status_cd'){
                            if(value.code == 102){
                                $('#'+key).addClass('label-success').text(value.display);
                            }
                        }else if (key == 'id' || key == 'type'){
                            $('#'+key).text(value);
                        }else{
                            $('#'+key).val(value);
                        }
                    });

                },
                error: function (data) {
                    // alert(JSON.stringify(data));
                }
            });
        });

        $("#refund_name").keyup(function(event){
            if (!(event.keyCode >=37 && event.keyCode<=40)) {
                var inputVal = $(this).val();
                $(this).val(inputVal.replace(/[a-z0-9]/gi,''));
            }
        });



    </script>

@endpush
