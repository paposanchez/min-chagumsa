@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">


            <div class="card">

                <div class="card-header ch-alt">
                    <h2>
                        <span class="text-danger text-lighter">{{ $diagnosis->status->display() }}</span> {{ $diagnosis->chakey }}
                        <small>번호 : <span class="text-info">{{ $diagnosis->id }}</span> / 최초생성일 : <span
                                    class="text-info">{{ $diagnosis->created_at }}</span> / 최종수정일 : <span
                                    class="text-info">{{ $diagnosis->updated_at or '-' }}</span></small>
                    </h2>


                    <ul class="actions">
                        @if($user->hasRole('admin'))
                            <button class="btn btn-default pull-right" id="orderBtn" data-url="/order/{{ $order->id }}"
                                    data-toggle="tooltip" title="주문보기">주문보기
                            </button>
                        @endif
                        @if($user->hasRole(['admin', 'engineer']) && $diagnosis->status_cd == 114)
                            <button class="btn btn-primary pull-right status_button" data-toggle="tooltip" title="검토완료"
                                    data-target="#diagnosisForm" data-type="review_complete">검토완료
                            </button>
                        @endif

                        {{--                        @if($user->hasRole(['admin', 'technician']) && $diagnosis->status_cd == 126)--}}
                        <button class="btn btn-primary pull-right status_button" data-toggle="tooltip" title="진단완료"
                                data-target="#issueForm" data-type="issue">진단완료
                        </button>
                        {{--@endif--}}
                    </ul>
                </div>

                <div class="card-body">


                    <ul class="tab-nav" role="tablist">
                        <li role="presentation" class="active">
                            <a class="col-sx-4" href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab"
                               aria-expanded="true">발급내역</a>
                        </li>
                        <li role="presentation" class="">
                            <a class="col-xs-4" href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab"
                               aria-expanded="false">주문정보</a>
                        </li>
                    </ul>

                    <div class="tab-content  p-20">

                        <div role="tabpanel" class="tab-pane animated fadeIn active" id="tab-1">


                            <div class="row">
                                <div class="col-md-4">
                                    @if($user->hasRole(['admin', 'technician']))
                                    @endif

                                    {!! Form::model($diagnosis, ['method' => 'POST','route' => ['diagnosis.issue', 'id' => $diagnosis->id], 'class'=>'form-horizontal', 'id'=>'issueForm', 'enctype'=>"multipart/form-data"]) !!}
                                    @component('components.car_basic_info', [
                                    'diagnosis' => $diagnosis,
                                    'select_vin_yn' => $select_vin_yn,
                                    'kinds' => $kinds,
                                    'select_color' => $select_color,
                                    'select_transmission' => $select_transmission,
                                    'select_fueltype' => $select_fueltype
                                    ])
                                    @endcomponent
                                    {!! Form::close() !!}
                                </div>

                                <div class="col-md-8">
                                    {!! Form::model($diagnosis, ['method' => 'POST','route' => ['diagnosis.review-complete', 'id' => $diagnosis->id], 'class'=>'form-horizontal', 'id'=>'diagnosisForm', 'enctype'=>"multipart/form-data"]) !!}

                                    <ul>
                                        @each('partials.diagnosis', $diagnosis_layout, 'entry', 'partials.diagnoses-empty')


                                    </ul>


                                    {!! Form::close() !!}
                                </div>
                            </div>


                        </div>

                        <div role="tabpanel" class="tab-pane animated fadeIn" id="tab-2">
                            <div class="row">
                                <div class="col-xs-6">

                                    <div class="block bg-white" style="margin-bottom:10px;">

                                        <h4>주문정보</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item no-border"><span>주문자명</span> <em
                                                        class="pull-right">{{ $diagnosis->order->orderer_name }}</em>
                                            </li>
                                            <li class="list-group-item no-border"><span>주문자연락처</span> <em
                                                        class="pull-right">{{ $diagnosis->order->orderer_mobile }}</em>
                                            </li>
                                            <li class="list-group-item no-border"><span>상품명</span> <em
                                                        class="pull-right">{{ $diagnosis->orderItem->item->name }}</em>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="block bg-white" style="margin-bottom:10px;">
                                        <h4>차량정보</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item no-border"><span>차량명</span> <em
                                                        class="pull-right">{{ $diagnosis->order->getCarFullName() }}</em>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body card-padding">


                </div>
            </div>
        </div>
    </section>

@endsection

@push( 'header-script' )
    <script src="{{ Helper::assets( 'js/plugin/chagumsa.js' ) }}"></script>
@endpush


@push( 'footer-script' )
    <script type="text/javascript">


        // $(document).ready(function () {
        //
        //     //######### added for image upload
        //     var $clicked_container;
        //     $(document).on('click', '.diagnosis-uploader', function (e) {
        //         e.preventDefault();
        //         $clicked_container = $(this).closest('.diagnosis-uploader-form').prev('.diagnosis-uploader-container');
        //         $(this).prev('.diagnosis-uploader-input').trigger('click');
        //     });
        //
        //     //drag 일때 처리
        //
        //     var onDragEnter = function (event) {
        //             event.preventDefault();
        //             $(".dropzone").addClass("dragover");
        //             $(this).closest("form").children("div").toggleClass("btn-info").toggleClass("btn-warning");
        //         },
        //
        //         onDragOver = function (event) {
        //             event.preventDefault();
        //             if (!$(".dropzone").hasClass("dragover"))
        //                 $(this).closest("form").children("div").toggleClass("btn-info").toggleClass("btn-warning");
        //         },
        //
        //         onDragLeave = function (event) {
        //             event.preventDefault();
        //             $(this).closest("form").children("div").toggleClass("btn-warning").toggleClass("btn-info");
        //         },
        //
        //         onDrop = function (event) {
        //             event.preventDefault();
        //
        //             var selected_file_num = event.originalEvent.dataTransfer.files.length;
        //             if (selected_file_num == 1) {
        //                 $(".dropzone").removeClass("dragover");
        //                 $clicked_container = $(this).closest('.diagnosis-uploader-form').prev('.diagnosis-uploader-container');
        //                 $(this).closest("form").children("input").prop("files", event.originalEvent.dataTransfer.files);
        //                 $(this).closest("form").children("div").toggleClass("btn-warning").toggleClass("btn-info");
        //             } else {
        //                 $(this).closest("form").children("div").toggleClass("btn-warning").toggleClass("btn-info");
        //                 $.notify("진단데이터 이미지는 1개의 이미지만 선택 가능합니다.", "error");
        //             }
        //
        //         };
        //
        //     $(".dropzone")
        //         .on("dragenter", onDragEnter)
        //         .on("dragover", onDragOver)
        //         .on("dragleave", onDragLeave)
        //         .on("drop", onDrop);
        //
        //
        //     $('.diagnosis-uploader-form').ajaxForm({
        //         beforeSubmit: function (data, form, option) {
        //             //validation
        //             return true;
        //         },
        //         success: function (response, status) {
        //             //성공후 서버에서 받은 데이터 처리
        //             if (response.status == 'success') {
        //                 $clicked_container.append(response.thumbnail);
        //                 $.notify("파일업로드가 성공했습니다.", "success");
        //             } else {
        //                 $.notify("파일업로드가 실패했습니다.", "warning");
        //             }
        //
        //         },
        //         error: function () {
        //             //에러발생을 위한 code페이지
        //             $.notify("파일업로드가 실패했습니다.", "warning");
        //         }
        //     });
        //
        //
        //     var $clicked_thumbnail;
        //     $(document).on('click', '.diagnosis-thumbnail', function (e) {
        //         $clicked_thumbnail = $(this);
        //     });
        //
        //     $(document).on('click', '.diagnosis-file-delete', function (e) {
        //         e.preventDefault();
        //         if (confirm('해당 파일을 삭제하시겠습니까?')) {
        //             $('#loading').show();
        //             var id = $(this).data('id');
        //             $.ajax({
        //                 url: '/diagnosis/delete-file/' + id,
        //                 type: 'post',
        //                 dataType: 'json',
        //                 success: function (response) {
        //
        //                     if (response == 'success') {
        //                         $clicked_thumbnail.remove();
        //                         $.notify("파일이 정상적으로 삭제되었습니다.", "success");
        //
        //                     } else {
        //                         $.notify("파일을 삭제할 수 없습니다.", "warning");
        //                     }
        //
        //                 },
        //                 error: function (data) {
        //                     $.notify("파일을 삭제할 수 없습니다.", "warning");
        //                 },
        //                 complete: function () {
        //                     $('.ekko-lightbox').trigger('click');
        //
        //                     $('#loading').hide();
        //
        //                 }
        //             })
        //
        //         }
        //
        //     });
        //
        //     //######### added for image upload
        //     var diagnosis_audio;
        //     $('.diagnosis-soundplay').on('click', function (e) {
        //
        //         e.preventDefault();
        //         var $obj = $(this).find('.fa');
        //
        //         if ($obj.hasClass("fa-play")) {
        //             // remove all started instance
        //             $('.diagnosis-soundplay .fa-pause').each(function () {
        //                 $(this).removeClass('fa-pause').addClass('fa-play');
        //                 if (diagnosis_audio instanceof Audio) {
        //                     diagnosis_audio.pause();
        //                 }
        //                 diagnosis_audio = null;
        //             });
        //
        //             var s = $obj.data('source');
        //             diagnosis_audio = new Audio(s);
        //             diagnosis_audio.play();
        //             $obj.removeClass('fa-play').addClass('fa-pause');
        //         } else {
        //             diagnosis_audio.pause();
        //             $obj.removeClass('fa-pause').addClass('fa-play');
        //         }
        //
        //     });
        //
        //     $(".selected_cd").click(function () {
        //         var change_value = $(this).children('input').val();
        //         var diagnosis_id = $(this).data('id');
        //
        //         var notify = $.notify({}, {
        //             type: 'success',
        //             element: 'body',
        //             position: null,
        //             allow_dismiss: true,
        //             showProgressbar: false,
        //             animate: {
        //                 enter: 'animated fadeInDown',
        //                 exit: 'animated fadeOutUp'
        //             },
        //         });
        //
        //         $.ajax({
        //             type: 'post',
        //             dataType: 'json',
        //             url: '/diagnosis/update-code',
        //             data: {
        //                 'id': diagnosis_id,
        //                 'selected': change_value
        //             },
        //             success: function (data) {
        //                 notify.update('type', 'success');
        //                 notify.update('title', '<strong>선택값이</strong>');
        //                 notify.update('message', '정상적으로 변경되었습니다.');
        //             },
        //             error: function (data) {
        //                 notify.update('type', 'warning');
        //                 notify.update('message', '오류가 발생했습니다.');
        //             }
        //         })
        //     });
        //
        //     $('.save').on('click', function () {
        //         var diagnosis_id = $(this).data('id');
        //         var comment = $('#' + diagnosis_id).val();
        //         var notify = $.notify({}, {
        //             type: 'success',
        //             element: 'body',
        //             position: null,
        //             allow_dismiss: true,
        //             showProgressbar: false,
        //             animate: {
        //                 enter: 'animated fadeInDown',
        //                 exit: 'animated fadeOutUp'
        //             },
        //         });
        //         $.ajax({
        //             url: '/diagnosis/update-comment',
        //             type: 'post',
        //             dataType: 'json',
        //             data: {
        //                 'diagnosis_id': diagnosis_id,
        //                 'comment': comment
        //             },
        //             success: function (data) {
        //                 notify.update('type', 'success');
        //                 notify.update('title', '<strong>점검의견</strong>이 ');
        //                 notify.update('message', '정상적으로 변경되었습니다.');
        //             },
        //             error: function (data) {
        //                 notify.update('type', 'warning');
        //                 notify.update('message', '오류가 발생했습니다.');
        //             }
        //         })
        //     });
        //
        //     $('#order_complete').click(function () {
        //         var order_id = $(this).data('id');
        //         if (confirm('진단을 완료하시겠습니까? 이후 수정이 불가합니다.')) {
        //             $.ajax({
        //                 url: '/diagnosis/complete',
        //                 type: 'post',
        //                 dataType: 'json',
        //                 data: {
        //                     'order_id': order_id
        //                 },
        //                 success: function (data) {
        //                     alert('진단이 완료되었습니다.');
        //                     location.href = '/diagnosis';
        //                 },
        //                 error: function (data) {
        //                     alert('처리중 오류가 발생하였습니다.');
        //                 }
        //             })
        //         }
        //     });
        // });


        $(".selected_cd").click(function () {
            var diagnoses_id = $(this).data('diagnoses_id');
            var change_value = $(this).data('id');

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/diagnosis/update-code',
                data: {
                    'diagnoses_id': diagnoses_id,
                    'selected': change_value
                },
                success: function (data) {
                    alert('정상적으로 변경되었습니다.');
                },
                error: function (data) {
                    alert(JSON.stringify(data));
                }
            })
        });

        $(document).on('click', '#orderBtn', function () {
            var url = $(this).data('url');
            window.open(url, 'blank')
        });

        $(document).on('click', '.status_button', function () {
            var type = $(this).data('type');
            var target_form = $(this).data('target');

            if (type != 'issue') {
                swal({
                    title: "해당 진단을 검토완료 처리하시겠습니까?",
                    text: "완료된 진단은 복구할 수 없습니다.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "네",
                    cancelButtonText: "아니요",
                }).then(function (isConfirm) {
                    if (isConfirm) {
                        $(target_form).submit();
                        // back 시에만 표시
                        // swal("진단 검토완료가 처리되었습니다.", "", "success");
                    }
                });
            } else {
                swal({
                    title: "해당 진단을 발급완료 처리하시겠습니까?",
                    text: "완료된 진단은 복구할 수 없습니다.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "네",
                    cancelButtonText: "아니요",
                }).then(function (isConfirm) {
                    if (isConfirm) {
                        $(target_form).submit();
                        // back 시에만 표시
                        // swal("진단 발급완료가 처리되었습니다.", "", "success");
                    }
                });
            }
        });

        //기타 색상 및 기타 연료
        $(document).on('change', '.etc_sel', function () {
            var target = $(this).data('target');

            if ($(this).selected().val() == 1106 || $(this).selected().val() == 1132) {
                $(target).removeClass('hidden');
            } else {
                $(target).addClass('hidden');
            }
        });


    </script>
@endpush
