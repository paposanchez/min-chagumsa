@extends( 'web.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>
        <h2>마이페이지
            <div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i
                        class="fa fa-angle-right"></i> <span>주문목록</span></div>
        </h2>
    </div>

    <div id='sub_wrap' class="join_wrap order-container">


        <div class='order_info_box'>


            <div class='order_info_title clearfix '>

                <span class="text-lg text-light">{{ $order->getOrderNumber() }}</span>

                <small class="pull-right text-muted text-light" data-toggle="tooltip"
                       title="주문일자">{{ $order->created_at->format('Y년 m월 d일 H:i') }}</small>
            </div>

            <div class='order_info_cont'>
                <div class='order_info_desc'>
                    <span>주문자정보</span>
                    <span>차량정보</span>
                    <span>주문정보</span>
                </div>

                <div class='order_info_desc'>
                    <span>{{ $order->orderer_name }}
                        <small class="text-muted">{{ $order->orderer_mobile }}</small></span>
                    <span>{{ $order->getCarFullName() }}</span>
                    <span>{{ $order->item->name }}
                        <small class="text-muted">({{ number_format($order->item->price) }}원)</small></span>
                </div>

                <div class='order_info_btn text-center'>
                    {{ $order->status->display() }}
                </div>
            </div>
        </div>

        <br/>
        <br/>

        {!! Form::open(['method' => 'POST','class'=>'form-horizontal', 'id'=>'frmOrder', 'enctype'=>"multipart/form-data"]) !!}

        <fieldset>

            <div class="form-group">
                <label for="">차량번호</label>

                <div class="block">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <input type="text" class="form-control input-lg wid50" id="car_number" placeholder='차량번호'
                               value="{{ $order->car_number }}" name="car_number">
                    </div>
                    <small class='help-block'>※ 12저1234 또는 서울12치1233 와 같이 입력해 주세요.</small>
                    @if ($errors->has('car_number'))
                        <span class="text-danger">
                            {{ $errors->first('car_number') }}
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <label for="">모델정보</label>

                <div class="block">

                    <h4 style="text-align:left !important;">{{ $order->getCarFullName() }}</h4>
                    <small class='help-block'>※ 차량 모델정보는 변경하실 수 없습니다.</small>
                </div>
            </div>


            <div class="form-group">
                <label for="">침수/사고여부</label>

                <div class="block">
                    <div class="row">

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">침수여부</label>
                                <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                    <label>
                                        <input type="checkbox" name="flooding"
                                               value='1'
                                               @if($order->flooding_state_cd == 1)
                                               checked
                                                @endif
                                        ><span>침수차량일 경우 선택하세요</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">사고여부</label>
                                <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                    <label>
                                        <input type="checkbox" name="accident"
                                               value='1'
                                               @if($order->accident_state_cd == 1)
                                               checked
                                                @endif
                                        ><span>사고차량일 경우 선택하세요</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="">차량옵션</label>

                <div class="block">
                    <ul class='order_option_wrap'>
                        @foreach($options_group as $key => $val)
                            <li><strong>{{ $val }}</strong>
                                @foreach($options as $option)
                                    @if($key == $option->group)
                                        <div class='option_box'>
                                            <label>
                                                <input type='checkbox' class='psk type2' value="{{ $option->id }}"
                                                       @foreach($order_features as $feature)
                                                       @if($feature->features_id == $option->id)
                                                       checked
                                                       @endif
                                                       @endforeach
                                                       name="options_ck[]">
                                                <span class='lbl' name="exterior_ck"> {{ $option->display() }}</span>
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </li>
                        @endforeach
                    </ul>

                    <small class='help-block'>※ 추후 가격 산정에 영향을 미치므로 아래 항목 중 장착되어 있는 옵션을 정확히 체크해 주세요.</small>
                </div>
            </div>

            <p class="form-control-static text-center">
                <a href="/mypage/order/{{ $order->id }}" class='btn btn-default btn-lg wid25'>돌아가기</a>
                <button type="button" class='btn btn-primary btn-lg wid25' id="save">저장</button>
            </p>
        </fieldset>

        {!! Form::close() !!}

    </div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
    var car_num_chk = function (car_num) {
        var pattern1 = /\d{2}[가-힣ㄱ-ㅎㅏ-ㅣ\x20]\d{4}/g; // 12저1234
        var pattern2 = /[가-힣ㄱ-ㅎㅏ-ㅣ\x20]{2}\d{2}[가-힣ㄱ-ㅎㅏ-ㅣ\x20]\d{4}/g; // 서울12치1233
        if (!pattern1.test(car_num)) {
            if (!pattern2.test(car_num)) {
                return 1;
            }
            else {
                return 2;
            }
        }
        else {
            return 2;
        }
    };


    $(function () {
        // 차량번호 검사
        $('#save').on('click', function(){
            var car_num = $('#car_number').val();
            if (car_num_chk(car_num) == 1) {
                alert('차량번호를 정확히 입력해주세요.');
                $('#car_number').focus();
            }else{
                $('#frmOrder').submit();
            }
        });


    });



</script>
@endpush
