@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>주문목록</span></div></h2></div>

<div id='sub_wrap'>


        <div class='order_info_box'>


                <div class='order_info_title clearfix '>

                        <span class="text-lg text-light" >{{ $order->getOrderNumber() }}</span>

                        <small class="pull-right text-muted text-light" data-toggle="tooltip" title="주문일자" >{{ $order->created_at->format('Y년 m월 d일 H:i') }}</small>
                </div>

                <div class='order_info_cont'>
                        <div class='order_info_desc'>
                                <span>주문자정보</span>
                                <span>차량정보</span>
                                <span>주문정보</span>
                        </div>

                        <div class='order_info_desc'>
                            <span>{{ $order->orderer_name }} <small class="text-muted">{{ $order->orderer_mobile }}</small></span>
                            <span>{{ $order->getCarFullName() }}</span>
                            <span>{{ $order->item->name }} <small class="text-muted">({{ number_format($order->item->price) }}원)</small></span>
                        </div>

                        <div class='order_info_btn text-center'>
                                {{ $order->status->display() }}
                        </div>
                </div>
        </div>

        <br/>
        <br/>

        {!! Form::model($order, ['method' => 'PATCH','route' => ['mypage.order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}

        <fieldset>


                <div class="row">

                        <div class="col-xs-6">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">차량번호</label>
                                        <input type="text" class="form-control input-lg" id="car_number" placeholder='차량번호'  value="{{ $order->car_number }}" name="car_number">
                                </div>

                        </div>

                        <div class="col-xs-6">

                                <div class="form-group">
                                        <label for="exampleInputEmail1" class="">모델정보</label>
                                        <p class="form-control-static">
                                                {{ $order->getCarFullName() }}
                                        </p>
                                </div>

                        </div>

                </div>




                <div class="row">

                        <div class="col-xs-6">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">침수여부</label>
                                        <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                                <label>
                                                        <input type="checkbox" name="flooding"
                                                        value='1'
                                                        @if($order->accident == 1)
                                                        chekced
                                                        @endif
                                                        ><span>침수차량일 경우 선택하세요</span>
                                                </label>
                                        </div>
                                </div>
                        </div>

                        <div class="col-xs-6">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">사고여부</label>
                                        <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                                <label>
                                                        <input type="checkbox" name="accident"
                                                        value='1'
                                                        @if($order->accident == 1)
                                                        chekced
                                                        @endif
                                                        ><span>사고차량일 경우 선택하세요</span>
                                                </label>
                                        </div>
                                </div>
                        </div>

                </div>


                <div class="form-group">
                        <label for="">차량옵션
                                <small class='text-danger pull-right'>추후 가격 산정에 영향을 미치므로 아래 항목 중 장착되어 있는 옵션을 정확히 체크해 주세요.</small>
                        </label>

                        <ul class='order_option_wrap'>
                                <li><strong>외관</strong>
                                        @foreach($exterior_option as $exterior)
                                        <div class='option_box'>
                                                <label>
                                                        <input type='checkbox' class='psk type2' value="{{ $exterior->id }}" name="options_ck[]">
                                                        <span class='lbl' name="exterior_ck"> {{ $exterior->display() }}</span>
                                                </label>
                                        </div>
                                        @endforeach
                                </li>
                                <li><strong>내장</strong>
                                        @foreach($interior_option as $interior)
                                        <div class='option_box'>
                                                <label>
                                                        <input type='checkbox' class='psk type2' value="{{ $interior->id }}" name="options_ck[]">
                                                        <span class='lbl' name="exterior_ck"> {{ $interior->display() }}</span>
                                                </label>
                                        </div>
                                        @endforeach
                                </li>
                                <li><strong>안전</strong>
                                        @foreach($safety_option as $safety)
                                        <div class='option_box'>
                                                <label>
                                                        <input type='checkbox' class='psk type2' value="{{ $safety->id }}" name="options_ck[]">
                                                        <span class='lbl' name="exterior_ck"> {{ $safety->display() }}</span>
                                                </label>
                                        </div>
                                        @endforeach
                                </li>
                                <li><strong>편의</strong>
                                        @foreach($facilities_option as $facilites)
                                        <div class='option_box'>
                                                <label>
                                                        <input type='checkbox' class='psk type2' value="{{ $facilites->id }}" name="options_ck[]">
                                                        <span class='lbl' name="exterior_ck"> {{ $facilites->display() }}</span>
                                                </label>
                                        </div>
                                        @endforeach
                                </li>
                                <li><strong>멀티미디어</strong>
                                        @foreach($multimedia_option as $multimedia)
                                        <div class='option_box'>
                                                <label>
                                                        <input type='checkbox' class='psk type2' value="{{ $multimedia->id }}" name="options_ck[]">
                                                        <span class='lbl' name="exterior_ck"> {{ $multimedia->display() }}</span>
                                                </label>
                                        </div>
                                        @endforeach
                                </li>
                        </ul>


                </div>


                <p class="form-control-static text-center">
                        <a href="/mypage/order/{{ $order->id }}" class='btn btn-default btn-lg wid25'>돌아가기</a>
                        <button type="submit" class='btn btn-primary btn-lg wid25'>저장</button>
                </p>
        </fieldset>

        {!! Form::close() !!}

</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
