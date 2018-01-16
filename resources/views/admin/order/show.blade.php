@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )

    <section id="content">
        <div class="container">
            <div class="col-xs-6">
                <div class="card">
                    <div class="card-header">
                        <h2>주문 상세보기
                            <small>설명</small>
                        </h2>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">주문자 성명</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->orderer_name }}</span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">주문자 휴대폰번호</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->orderer_mobile }}</span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">이메일</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->orderer? $order->orderer->email : '-' }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button class="btn btn-primary"
                                                data-loading-text="{{ trans('common.button.loading') }}"
                                                id="" type="button">버튼
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>결제 정보 보기
                            <small>설명</small>
                        </h2>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">상품명</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->orderItem->item->name }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">결제금액</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->orderItem->price }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">결제방법</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->purchase->type }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">결제일자</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->purchase->created_at->format('Y-m-d H시 m분 s초') }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">결제번호</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->purchase_id }}</span>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>차량 정보 보기
                            <small>설명</small>
                        </h2>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">차량번호</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->carNumber->car_number }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">차대번호</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->carNumber->vin_number }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">차량 모델명</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->getCarFullName() }}</span>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="card">
                    <div class="card-header">
                        <h2>전체 타임라인
                            <small>설명</small>
                        </h2>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="card-header">
                                    <h2>
                                        <small>주문</small>
                                    </h2>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">주문신청</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->created_at }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">주문완료</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->updated_at }}</span>
                                    </div>
                                </div>
                                @if($order->diagnosis)
                                <div class="card-header">
                                    <h2>
                                        <small>진단</small>
                                    </h2>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">진단신청</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->diagnosis->created_at }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">예약확정</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->diagnosis->confirm_at ? $order->diagnosis->confirm_at : '-' }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">진단시작</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->diagnosis->start_at }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">진단완료</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->diagnosis->completed_at }}</span>
                                    </div>
                                </div>
                                @endif
                                @if($order->certificate)
                                <div class="card-header">
                                    <h2>
                                        <small>인증</small>
                                    </h2>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">인증서신</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->certificate->created_at }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">검토중</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->certificate->updated_at }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">발급완료</label>
                                    <div class="col-md-6">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                @endif
                                @if($order->warranty)
                                <div class="card-header">
                                    <h2>
                                        <small>보증</small>
                                    </h2>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">보증신청</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->warranty->created_at}}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">발급완료</label>
                                    <div class="col-md-6">
                                        <span class="help-block">{{ $order->warranty->updated_at}}</span>
                                    </div>
                                </div>
                                @endif
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push( 'footer-script' )
    <script type="text/javascript">
        $(function () {


            $('#areas').change(function () {
                var garage_area = $('#areas option:selected').text();
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/order/get-section',
                    data: {
                        'garage_area': garage_area
                    },
                    success: function (data) {

                        //select box 초기화
                        $('#sections').html("");
                        $('#garages').html('<option value="0">대리점을 선택하세요.</option>');
                        $('#sections').append('<option value="0">구/군을 선택하세요.</option>');
                        $.each(data, function (key, value) {
                            $('#sections').append($('<option/>', {
                                value: value,
                                text: value
                            }));
                        });
                    },
                    error: function (data) {
                        alert('error');
                    }
                })
            });

            $('#sections').change(function () {
                var garage_area = $('#areas option:selected').text();
                var garage_section = $('#sections option:selected').text();

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/order/get-address',
                    data: {
                        'sel_area': garage_area,
                        'sel_section': garage_section
                    },
                    success: function (data) {
                        $('#garages').html("");
                        $('#garages').append('<option value="0">대리점을 선택하세요.</option>');
                        $.each(data, function (key, value) {
                            $('#garages').append($('<option/>', {
                                value: key,
                                text: value
                            }))
                        });
                    },
                    error: function (data) {
                        alert('error');
                    }
                });
            });

            $('#garages').change(function () {
                var garage_id = $('#garages option:selected').val();

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/order/get-engineer',
                    data: {
                        'garage_id': garage_id
                    },
                    success: function (data) {
                        $('#engineer').html('');
                        $.each(data, function (key, value) {
                            $('#engineer').append($('<option/>', {
                                value: key,
                                text: value
                            }))
                        });
                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                    }
                })
            });

            $('#bcs_submit').on('click', function () {
                var garage = $('#garages').val();
                var date = $('#date').val();
                var time = $('#time').val();

                if(garage == 0){
                    alert('정비소를 선택해주세요.');
                }else if (date.length == 0){
                    alert('입고날짜를 입력하세요.');
                }else if (time.length == 0){
                    alert('입고시간을 입력하세요.');
                }else{
                    $('#bcsForm').submit();
                }
            });

            $("#cancel-click").on("click", function () {
                if (confirm("해당 주문에 대한 결제를 취소하시겠습니까?")) {
                    var order_id = $(this).data("cancel_order_id");
                    if (order_id) {
                        $("#cancel-order_id").val(order_id);
                        $("#cancel-form").submit();
                    } else {
                        alert("해당 주문에 대한 주문번호 오류입니다.\n새로고침 후 결제취소를 진행해 주세요.");
                    }

                }
            });


        });
    </script>
@endpush
