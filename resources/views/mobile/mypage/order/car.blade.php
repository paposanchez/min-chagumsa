@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div class='pop_wrap'>
        <div class='pop_title'>차량정보 변경</div>
        <div class='pop_cont'>
            {!! Form::open(['method' => 'POST','class'=>'form-horizontal', 'id'=>'frmOrder', 'enctype'=>"multipart/form-data", 'autocomplete' => 'off']) !!}
            <div class='join_term_wrap'>
                <label>차량번호</label>
                <div class='ipt_line br10'>
                    <input type='text' class='ipt' id="car_number" placeholder='차량번호' value="{{ $order->car_number }}" name="car_number">
                </div>
            </div>

            <div class='br30'></div>

            <div class='join_term_wrap'>
                <label>6. 차량 모델</label>
                <div class='ipt_mob_cert'>
                    <div><input type='text' class='ipt brand' id="car-summary" value="{{ $order->getCarFullName() }}" readonly></div>
                </div>
                <div class='ipt_guide2' style='color:#bbb;'>
                    ※ 차량 모델정보는 변경하실 수 없습니다.
                </div>


            </div>

            <div class='br30'></div>

            <div class='ipt_line'>
                {{--<button class="btns btns_skyblue" type="button" style="display: none; width:30%;">이전</button> <button class='btns btns_green' style='display:inline-block;' id="step-btn" data-step="1" type="button">다음</button>--}}

                <div class="row">
                    <div class="col-md-6">
                        <button class="btns btns_green" style="display:inline-block;" id="step-btn" type="submit">차량변경</button>
                    </div>
                </div>

            </div>

            {!! Form::close() !!}
        </div>


    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {

        $("#frmOrder").validate({
            debug: true,
            rules: {
                car_number: { required: true}
            },
            messages: {
                car_number: "차량번호를 정확히 입력해 주세요."
            },
            submitHandler: function (form) {

                var car_num = $("#car_number").val();
                if(car_num_chk(car_num) === 1){

                    alert('차량번호를 정확히 입력해 주세요.');
                    $("#car_number").focus();
                    return false;
                }else{
                    form.submit();
                }

            }
        });

    });


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
</script>

@endpush
