@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.diagnosis')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <h3>
                <span class="text-lg">
                        <span class="text-danger text-lighter">{{ $order->status->display() }}</span>
                        <span class="text-lighter">| </span>
                    {{ $order->getOrderNumber() }}
                </span>
            <a href="/order/{{ $order->id }}" target="_blank" class="btn btn-default pull-right" data-toggle="tooltip" title="주문보기" style="margin-left:10px;">주문보기</a>
            @if($order->status_cd == 106)
            <button id="order_complete" class="btn btn-primary pull-right" data-toggle="tooltip" title="진단완료"
                    data-id="{{ $order->id }}" style="margin-left:10px;">진단완료
            </button>
            @endif
        </h3>

        <div class="row">

            <div class="col-xs-6">

                <div class="block">

                    <h4>주문정보</h4>
                    <ul class="list-group">

                        <li class="list-group-item no-border"><span>주문자명</span> <em
                                    class="pull-right">{{ $order->orderer_name }}</em></li>
                        <li class="list-group-item no-border"><span>주문자연락처</span> <em
                                    class="pull-right">{{ $order->orderer_mobile }}</em></li>
                        <li class="list-group-item no-border"><span>상품명</span> <em
                                    class="pull-right">{{ $order->item->name }}</em></li>

                    </ul>

                </div>

            </div>

            <div class="col-xs-6">

                <div class="block ">

                    <h4>차량정보</h4>
                    <ul class="list-group">

                        <li class="list-group-item no-border"><span>차량명</span> <em
                                    class="pull-right">{{ $order->getCarFullName()  }}</em></li>
                        <li class="list-group-item no-border"><span>사고유무</span> <em
                                    class="pull-right">{{ $order->accident_state_cd == 1 ? '예' : '아니요' }}</em></li>
                        <li class="list-group-item no-border"><span>침수여부</span> <em
                                    class="pull-right">{{ $order->flooding_state_cd == 1 ? '예' : '아니요' }}</em></li>

                    </ul>
                </div>
            </div>
        </div>


        <div class="bg-white">

            <div class="row">
                <div class="col-md-3">

                    <div class="block" style="padding-top:10px;">
                        <h4 id="dia-top">진단레이아웃</h4>
                        <nav class="nav nav-sidebar inside_navigation">
                            <ul class="list-unstyled main-menu">
                                @foreach($diagnosis['entrys'] as $entrys)
                                    <li class="">
                                        <a href="#dia-{{ $entrys['name_cd'] }}">{{ $entrys['name']['display'] }}</a>
                                        <ul class="list-unstyled sub-menu">
                                            @foreach($entrys['entrys'] as $entry)
                                                <li class=""><a
                                                            href="#dia-{{ $entry['name_cd'] }}">{{ $entry['name']['display'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                </div>

                <div class="col-md-9">

                    <!-- <form class="form-horizontal">

                            <fieldset> -->

                    <div class="panel panel-primary">
                        @foreach($diagnosis['entrys'] as $entrys)
                            <div class="panel-heading" id="dia-{{ $entrys['name_cd'] }}">
                                <div class="row">
                                    <label for=""
                                           class="control-label col-sm-3">{{ $entrys['name']['display'] }}</label>
                                    <div class="col-sm-9 text-right has-error dark">
                                        <a href="#dia-top" class="btn btn-link" data-toggle="tooltip"
                                           title="위로"><i class="fa fa-arrow-up"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body no-padding">

                                <table class="table-diagnosis">

                                    <colgroup>
                                        <col width="25%">
                                        <col width="*">
                                    </colgroup>


                                    @foreach($entrys['entrys'] as $entry)
                                        <tbody>
                                        <tr id="dia-{{ $entry['name_cd'] }}">
                                            <th class="text-right">{{ $entry['name']['display'] }}</th>
                                            <td
                                                    class="
                                                                                                                                        clearfix
                                                                                                                                        @if(count($entry['children']))
                                                            no-padding
@endif
                                                            ">
                                                @each("partials.diagnosis", $entry['entrys'], 'entry')


                                                @if(isset($entry['children']))
                                                    <table class="">
                                                        <col width="25%">
                                                        <col width="*">
                                                        <tbody class="no-border">
                                                        @foreach($entry['children'] as $children)
                                                            <tr>
                                                                <th class="">{{ $children['name']['display'] }}</th>
                                                                <td>
                                                                    <ul class="list-unstyled no-margin">
                                                                        @foreach($children['entrys'] as $child)
                                                                            <li class="clearfix">
                                                                                @includeIf('partials.diagnosis', ['entry' =>  $child])
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif

                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                            </div>
                        @endforeach
                    </div>
                    <!--
                                                                                                    </fieldset>

                                                                                            </form> -->

                </div>

            </div>

        </div>

    </div>
@endsection

@push( 'header-script' )
<script src="{{ \App\Helpers\Helper::assets( 'js/plugin/chagumsa.js' ) }}"></script>
@endpush


@push( 'footer-script' )
<script type="text/javascript">
    $(document).ready(function () {

        //######### added for image upload
        var $clicked_container;
        $(document).on('click', '.diagnosis-uploader', function (e) {
            e.preventDefault();
            $clicked_container = $(this).closest('.diagnosis-uploader-form').prev('.diagnosis-uploader-container');
            $(this).prev('.diagnosis-uploader-input').trigger('click');
        });


        $('.diagnosis-uploader-form').ajaxForm({
            beforeSubmit: function (data, form, option) {
                //validation
                return true;
            },
            success: function (response, status) {
                //성공후 서버에서 받은 데이터 처리
                if (response.status == 'success') {
                    $clicked_container.append(response.thumbnail);
                    $.notify("파일업로드가 성공했습니다.", "success");
                } else {
                    $.notify("파일업로드가 실패했습니다.", "warning");
                }

            },
            error: function () {
                //에러발생을 위한 code페이지
                $.notify("파일업로드가 실패했습니다.", "warning");
            }
        });


        var $clicked_thumbnail;
        $(document).on('click', '.diagnosis-thumbnail', function (e) {
            $clicked_thumbnail = $(this);
        });

        $(document).on('click', '.diagnosis-file-delete', function (e) {
            e.preventDefault();
            if (confirm('해당 파일을 삭제하시겠습니까?')) {
                $('#loading').show();
                var id = $(this).data('id');
                $.ajax({
                    url: '/diagnosis/delete-file/' + id,
                    type: 'post',
                    dataType: 'json',
                    success: function (response) {

                        if (response == 'success') {
                            $clicked_thumbnail.remove();
                            $.notify("파일이 정상적으로 삭제되었습니다.", "success");

                        } else {
                            $.notify("파일을 삭제할 수 없습니다.", "warning");
                        }

                    },
                    error: function (data) {
                        $.notify("파일을 삭제할 수 없습니다.", "warning");
                    },
                    complete: function () {
                        $('.ekko-lightbox').trigger('click');

                        $('#loading').hide();

                    }
                })

            }

        });

        //######### added for image upload


        var diagnosis_audio;
        $('.diagnosis-soundplay').on('click', function (e) {

            e.preventDefault();
            var $obj = $(this).find('.fa');

            if ($obj.hasClass("fa-play")) {
                // remove all started instance
                $('.diagnosis-soundplay .fa-pause').each(function () {
                    $(this).removeClass('fa-pause').addClass('fa-play');
                    if (diagnosis_audio instanceof Audio) {
                        diagnosis_audio.pause();
                    }
                    diagnosis_audio = null;
                });

                // var s = "/assets/crowd-cheering.mp3";
                var s = $obj.data('source');
                diagnosis_audio = new Audio(s);
                diagnosis_audio.play();
                $obj.removeClass('fa-play').addClass('fa-pause');
            } else {
                diagnosis_audio.pause();
                $obj.removeClass('fa-pause').addClass('fa-play');
            }

        });
        $(".selected_cd").change(function () {
            var change_value = $(this).val();
            var diagnosis_id = $(this).data('id');
            var notify = $.notify({}, {
                type: 'success',
                element: 'body',
                position: null,
                allow_dismiss: true,
                showProgressbar: false,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
            });

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/diagnosis/update-code',
                data: {
                    'id': diagnosis_id,
                    'selected': change_value
                },
                success: function (data) {
                    notify.update('type', 'success');
                    notify.update('title', '<strong>선택값이</strong>');
                    notify.update('message', '정상적으로 변경되었습니다.');
                },
                error: function (data) {
                    notify.update('type', 'warning');
                    notify.update('message', '오류가 발생했습니다.');
                }
            })
        });

        $('.save').on('click', function () {
            var diagnosis_id = $(this).data('id');
            var comment = $('#' + diagnosis_id).val();
            var notify = $.notify({}, {
                type: 'success',
                element: 'body',
                position: null,
                allow_dismiss: true,
                showProgressbar: false,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
            });
            $.ajax({
                url: '/diagnosis/update-comment',
                type: 'post',
                dataType: 'json',
                data: {
                    'diagnosis_id': diagnosis_id,
                    'comment': comment
                },
                success: function (data) {
                    notify.update('type', 'success');
                    notify.update('title', '<strong>점검의견</strong>이 ');
                    notify.update('message', '정상적으로 변경되었습니다.');

                },
                error: function (data) {
                    notify.update('type', 'warning');
                    notify.update('message', '오류가 발생했습니다.');
                }
            })
        });

        $('#order_complete').click(function(){
            var order_id = $(this).data('id');
            if(confirm('진단을 완료하시겠습니까? 이후 수정이 불가합니다.')){
                $.ajax({
                    url : '/diagnosis/complete',
                    type : 'post',
                    dataType : 'json',
                    data : {
                        'order_id' : order_id
                    },
                    success : function (data){
                        alert('진단이 완료되었습니다.');
                        location.href='/diagnosis';
                    },
                    error : function (data){
                        alert('처리중 오류가 발생하였습니다.');
//                        alert(JSON.stringify(data));
                    }
                })
            }

        });
    });
</script>
@endpush
