@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.certificate')])
@endsection

@section( 'content' )
<div class="container-fluid">

        <h3>
                <span class="text-lg">
                        <span class="text-danger text-lighter">{{ $order->status->display() }}</span>
                        <span class="text-lighter">| </span>
                        {{ $order->getOrderNumber() }}
                </span>

                <a href="/order/{{ $order->id }}" target="_blank" class="btn btn-default pull-right" style="margin-left:10px;" >주문보기</a>

                <a href="{{ url("diagnosis", [$order->id]) }}" target="_blank" class="btn btn-default pull-right"  style="margin-left:10px;" data-toggle="tooltip" title="인증서 진단정보 보기">진단정보 보기</a>

                <button id="issue" class="btn btn-primary pull-right" data-toggle="tooltip" title="인증서 진단정보 보기" data-id="{{ $order->id }}">인증서 발급하기</button>



        </h3>





        <div class="row">

                <div class="col-xs-6">


                        <div class="block bg-white" style="margin-bottom:10px;">

                                <h4>주문정보</h4>
                                <ul class="list-group">

                                        <li class="list-group-item no-border"><span>주문자명</span> <em class="pull-right">{{ $order->orderer_name }}</em></li>
                                        <li class="list-group-item no-border"><span>주문자연락처</span> <em class="pull-right">{{ $order->orderer_mobile }}</em></li>
                                        <li class="list-group-item no-border"><span>상품명</span> <em class="pull-right">{{ $order->item->name }}</em></li>

                                </ul>

                        </div>

                </div>

                <div class="col-xs-6">

                        <div class="block bg-white" style="margin-bottom:10px;">

                                <h4>차량정보</h4>
                                <ul class="list-group">

                                        <li class="list-group-item no-border"><span>차량명</span> <em class="pull-right">{{ $order->getCarFullName()  }}</em></li>
                                        <li class="list-group-item no-border"><span>사고유무</span> <em class="pull-right">{{ $order->accident_state_cd == 1 ? '예' : '아니요' }}</em></li>
                                        <li class="list-group-item no-border"><span>침수여부</span> <em class="pull-right">{{ $order->flooding_state_cd == 1 ? '예' : '아니요' }}</em></li>

                                </ul>
                        </div>
                </div>

        </div>


        {!! Form::model($order, ['method' => 'PATCH','route' => ['certificate.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-basic', 'enctype'=>"multipart/form-data"]) !!}

                <div class="bg-white">

                        <div class="row">
                                <div class="col-md-4">

                                        <div class="block">
                                                <h4 id="dia-top">기본정보</h4>
                                                <ul class="list-group">
                                                        <li class="list-group-item">
                                                                <small>자동차 등록번호</small>
                                                                <input type="text" class="form-control" name="orders_car_number" value="{{ $order->car_number }}" required>
                                                        </li>

                                                        <li class="list-group-item">
                                                                <small>차대번호</small>
                                                                <input type="text" class="form-control" name="cars_vin_number" placeholder="차대번호를 입력해 주세요." value="{{ $car->vin_number ? $car->vin_number : '' }}" required>
                                                        </li>

                                                        <li class="list-group-item">
                                                                <small>수입차 차대번호</small>
                                                                <input type="text" class="form-control" placeholder="수입차 차대번호를 입력해 주세요." name="car_imported_vin_number" value="{{ $car->imported_vin_number ? $car->imported_vin_number : '' }}">
                                                        </li>

                                                        <li class="list-group-item">
                                                                <small>차대번호 동일성확인</small>
                                                                {!! Form::select('certificates_vin_yn_cd', $select_vin_yn, [$order->certificates->vin_yn_cd], ['class' =>'form-control']) !!}

                                                        </li>

                                                        <!-- <li class="list-group-item">
                                                        <small>소유자 이력</small>
                                                        <div class="input-group"><input type="text" class="form-control" name="certificates_history_owner" value="{{ $order->certificates ? $order->certificates->history_owner : '' }}" required><span class="input-group-addon">명</span></div>
                                                </li>

                                                <li class="list-group-item">
                                                <small>정비이력</small>
                                                <div class="input-group"><input type="text" class="form-control" name="certificates_history_maintance" value="{{ $order->certificates ? $order->certificates->history_maintance : '' }}" required><span class="input-group-addon">번</span></div>
                                        </li> -->

                                        <li class="list-group-item">
                                                <small>최초등록일</small>
                                                <div class="input-group">
                                                        <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" name="cars_registration_date" value="{{ $car->registration_date ? $car->registration_date : '' }}" required="required">
                                                        <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                                </div>
                                        </li>


                                        <li class="list-group-item">
                                                <small>사용월수</small>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" name="cars_history" value="{{ $car->registration_date ? $car->registration_date : '' }}" required>
                                                        <span class="input-group-addon">월</span>
                                                </div>
                                        </li>


                                        <li class="list-group-item">
                                                <small>연식(형식)</small>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" name="cars_year" value="{{ $car->year ? $car->year : '' }}" required>
                                                        <span class="input-group-addon">년</span>
                                                </div>

                                        </li>

                                        <li class="list-group-item">
                                            <small>차종</small>
                                            {!! Form::select('kind_cd', $kinds, [$car->kind_cd ? $car->kind_cd : ''], ['class'=>'form-control', 'required']) !!}
                                        </li>

                                        <li class="list-group-item">
                                                <small>주행거리</small>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" name="orders_mileage" value="{{ $order->mileage ? $order->mileage : '' }}" required>
                                                        <span class="input-group-addon">km</span>
                                                </div>

                                        </li>

                                        <li class="list-group-item">
                                                <small>배기량</small>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" name="cars_displacement" value="{{ $car->displacement ? $car->displacement : ''}}" required>
                                                        <span class="input-group-addon">cc</span>
                                                </div>

                                        </li>

                                        <li class="list-group-item">
                                                <small>외부색상</small>
                                                {!! Form::select('cars_exterior_color', $select_color, [$car->exterior_color_cd ? $car->exterior_color_cd : ''], ['class'=>'form-control', 'required']) !!}
                                        </li>

                                        <li class="list-group-item">
                                                <small>내부색상</small>
                                                {!! Form::select('cars_interior_color', $select_color, [$car->interior_color_cd ? $car->interior_color_cd : ''], ['class'=>'form-control', 'required']) !!}
                                        </li>

                                        <li class="list-group-item">
                                                <small>연비</small>
                                                <div class="input-group"><input type="text" class="form-control" name="cars_fuel_consumption" value="{{ $car->fuel_consumption ? $car->fuel_consumption : '' }}" required><span class="input-group-addon">km</span></div>
                                        </li>

                                        <li class="list-group-item">
                                                <small>엔진타입</small>
                                                <input type="text" class="form-control" name="cars_engine_type" value="{{ $car->engine_type ? $car->engine_type : '' }}" required>
                                        </li>

                                        <li class="list-group-item">
                                                <small>변속기</small>
                                                {!! Form::select('cars_transmission_cd', $select_transmission, [$car->transmission_cd ? $car->transmission_cd : ''], ['class'=>'form-control', 'required']) !!}
                                        </li>

                                        <li class="list-group-item">
                                                <small>사용연료</small>
                                                {!! Form::select('cars_fueltype_cd', $select_fueltype, [$car->fueltype_cd ? $car->fueltype_cd : '' ], ['class' => 'form-control', 'required']) !!}
                                        </li>

                                        <li class="list-group-item">
                                                <small>승차인원</small>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" name="passenger" value="{{ $car->passenger ? $car->passenger : '' }}" placeholder="" required>
                                                        <span class="input-group-addon">명</span>
                                                </div>

                                        </li>
                                </ul>
                        </div>

                </div>

                <div class="col-md-8">
                        <h4 style="margin-top:36px !important;">인증서 발급내역</h4>
                        @include("partials.certificate", ["order" => $order])
                </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <button id="certificate-submit" class="btn btn-info pull-right" data-toggle="tooltip" title="인증서 저장하기">인증서 저장하기</button>
            </div>
        </div>



</div>

{!! Form::close() !!}
</div><!-- container -->
@endsection

@push( 'header-script' )
{{ Html::style(Helper::assets('vendor/tagsinput/bootstrap-tagsinput.css')) }}
@endpush

@push( 'footer-script' )
{{ Html::script(Helper::assets( 'vendor/tagsinput/bootstrap-tagsinput.min.js' )) }}

<script type="text/template" id="qq-template">
@include("partials/files")
</script>
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}" />
<script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
<script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>

<script type="text/javascript">
$(function () {

    $(document).on('click', '#certificate-submit', function(){

            if(confirm("인증서를 발급하시겠습니까?"))
            {
                $("#frm-basic").submit();
            }
    });

    $("#frm-basic").validate({
        messages: {
            orders_car_number: "자동차 등록번호를 입력해 주세요.",
            cars_vin_number: "차대번호를 입력해 주세요.",
            certificates_vin_yn_cd: "차대번호 동일성확인을 선택해 주세요.",
            cars_registration_date: "차량의 최초등록일을 입력해 주세요.",
            cars_history : "사용월수를 입력하세요.",
            cars_year: "연식을 입력해 주세요.",
            orders_mileage: "주행거리를 km단위로 입력해 주세요. (정수값)",
            cars_displacement: "배기량을 입력해 주세요.",
            cars_engine_type: "엔진타입을 입력해 주세요.",
            cars_fuel_consumption: "연비를 선택해 주세요.",
            passenger : "승차인원을 입력해 주세요.",

            certificates_usage_history_depreciation : "사고/수리이력 감가금액을 입력해주세요.",
            certificates_basic_etc: "색상 등 기타 감가금액을 입력해주세요.",
            certificates_basic_registraion_depreciation: "등록일 보정 평가액을 선택해주세요.",
            certificates_usage_mileage_depreciation : "주행거리 감가금액을 입력해주세요.",
            exterior_comment : "주요외판 점검의견을 입력해주세요.",
            flooded_comment : "침수흔적 점검의견을 입력해주세요.",
            consumption_comment : "소모품상태 점검의견을 입력해주세요.",
            broken_comment : "고장진단 점검의견을 입력해주세요.",
            performance_power_cd : "동력전달 점검의견을 입력해주세요.",
            electronic_comment : "전기 점검의견을 입력해주세요.",
            interior_comment : "주요내판 점검의견을 입력해주세요.",
            exteriortest_comment : "차량외판 점검의견을 입력해주세요.",
            plugin_comment : "전장품 유리기어/작동상태 점검의견을 입력해주세요.",
            engine_comment : "엔진(원동기) 점검의견을 입력해주세요.",
            steering_comment : "조향장치 점검의견을 입력해주세요.",
            tire_comment : "타이어 점검의견을 입력해주세요.",
            accident_comment : "사고유무 점검의견을 입력해주세요.",
            interiortest_comment : "차량실내 점검의견을 입력해주세요.",
            driving_comment : "주행테스트 점검의견을 입력해주세요.",
            transmission_comment : "변속기 점검의견을 입력해주세요.",
            braking_comment : "제동장치 점검의견을 입력해주세요.",
            certificates_history_owner : "소유자 변경이력을 입력해주세요.",
            certificates_history_garage : "차고지 변경이력을 입력해주세요.",
            certificates_history_maintance : "정비 변경이력을 입력해주세요.",
            certificates_history_purpose : "용도 변경이력을 입력해주세요.",
            certificates_opinion: "종합의견을 입력해 주세요.",
            grade_state_cd : "차량등급을 선택해주세요.",
            certificates_valuation : "평가금액을 입력하세요.",
            certificates_history_insurance : "보험사고이력을 입력해주세요.",


            history_depreciation : "사용이력 감가금액을 입력해주세요.",
            basic_depreciation : "기본가격 감가금액을 입력해주세요.",
            special_depreciation : "특별요인 감가금액을 입력해주세요.",
            certificates_performance_depreciation : "차량성능삼태 감가금액을 입력해주세요."
        },
//        errorPlacement: function(error, element) {
//            var chk_name = element.attr("name");
//            $('input[name='+chk_name+'-error]').addClass('text-danger');
//        },
        submitHandler: function (form) {
            form.submit();
        }
    });


    // 인증서 발급하기
    $("#issue").click(function () {
        var id = $(this).data('id');
        var c = confirm("인증서가 발급되면 수정이 불가능합니다. \n인증서를 발급하시겠습니까?");
        if (c == true) {
            $.ajax({
                'type': 'post',
                'url': '/order/issue',
                data: {
                    'order_id': id
                },
                success: function (data) {
                    alert('인증서 발급이 완료되었습니다.');
                    location.href = "{{ url('/order/'.$order->id ) }}";
                },
                error: function (data) {
                    alert(data);
                }
            })
        }

    });

});


$(document).ready(function () {
    $('#plugin-attachment').fineUploader({
        debug: true,
//        template: 'qq-template',
        request: {
            inputName: "upfile",
            endpoint: '/file/upload',
            customHeaders: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        deleteFile: {
            enabled: true,
            endpoint: '/file/delete',
            customHeaders: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        thumbnails: {
            placeholders: {
                waitingPath: "{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/placeholders/waiting-generic.png' ) }}",
                notAvailablePath: "{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/placeholders/not_available-generic.png' ) }}",
            }
        },
        validation: {
            allowedExtensions: ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'hwp'],
            itemLimit: 3,
            sizeLimit: 5120000, // 50 kB = 50 * 1024 bytes
            stopOnFirstInvalidFile: true
        },
        text: {
            uploadButton: 'Upload a file',
            cancelButton: 'Cancel',
            retryButton: 'Retry',
            failUpload: 'Upload failed',
            dragZone: 'Drop files here to upload',
            formatProgress: "{percent}% of {total_size}",
            waitingForResponse: "Processing..."
        },
        messages: {
            typeError: "{file} has an invalid extension. Valid extension(s): {extensions}.",
            sizeError: "{file} is too large, maximum file size is {sizeLimit}.",
            minSizeError: "{file} is too small, minimum file size is {minSizeLimit}.",
            emptyError: "{file} is empty, please select files again without it.",
            noFilesError: "No files to upload.",
            onLeave: "The files are being uploaded, if you leave now the upload will be cancelled."
        },
        callbacks: {
            onComplete: function (id, fileName, responseJSON) {
                if (responseJSON.success == true) {
                    $.notify(responseJSON.msg, "success");

                    var $listItem = $(this).fineUploader('getItemByFileId', id);
                    $listItem.find('.plugin-attach-file-input').val(responseJSON.data.id);

                } else {
                    $.notify(responseJSON.msg, "error");
                }
            }


        }
    });

});
</script>
@endpush
