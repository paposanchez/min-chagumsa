@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <h3>
                <span class="text-lg">
                        <span class="text-danger text-lighter">{{ $order->status->display() }}</span>
                        <span class="text-lighter">| </span>
                    {{ $order->getOrderNumber() }}
                </span>
            <a href="/order/{{ $order->id }}" target="_blank" class="btn btn-default pull-right">주문보기</a>
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

                    <form class="form-horizontal">

                        <fieldset>


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
                                                                    "
                                                    >

                                                        {{--@each("partials.diagnosis", $entry['entrys'], 'entry')--}}
                                                        @foreach($entry['entrys'] as $entry)
                                                            @if($entry['name'])
                                                                <strong style="display:inline-block; width:100px;">{{ $entry['name']['display'] }}</strong>
                                                            @endif

                                                            @if($entry['use_image'] == 1)
                                                                @foreach($entry['files'] as $file)
                                                                    <a href="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $file['id'] }}&format=png&h_pos=10&bg_rgb=ffffff"
                                                                       class="diagnosis-thumbnail pull-right"
                                                                       data-toggle="lightbox"
                                                                       data-title="{{ $file['original'] }}"
                                                                       data-footer="{{ $file['created_at'] }} | {{ Helper::formatBytes($file['size']) }}"
                                                                       data-type="image"
                                                                       data-gallery="diagnosis-gallery"
                                                                    >
                                                                        <img
                                                                                src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $file['id'] }}&format=png&h_pos=10&bg_rgb=ffffff"
                                                                                data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=860&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $file['id'] }}&format=png&h_pos=10&bg_rgb=ffffff"
                                                                                class="img-responsive" style="width:30px;height:30px;display:inline-block;">
                                                                    </a>
                                                                @endforeach
                                                            @endif


                                                            @if($entry['options'])
                                                                {!! Form::select('selected[]', \App\Helpers\Helper::getCodeArray($entry['options_cd']), \App\Helpers\Helper::getCodePluck($entry['selected']), ['class'=>'selected_cd', 'id'=>'', 'data-id'=>$entry['id']]) !!}
                                                            @endif


                                                            @if($entry['use_voice'] == 1)
                                                                @foreach($entry['files'] as $file)
                                                                    <button type="button" class="btn btn-circle btn-primary diagnosis-soundplay" data-toggle="tooltip" data-source="{{ $file['fullpath'] }}" data-mime="{{ $file['mime'] }}"  title="{{ $file['original'] }}"><i class="fa fa-play"></i></button>
                                                                @endforeach

                                                                <textarea name="comment" class="form-control" data-id="{{ $entry['id'] }}" style="height:60px; margin-top:10px;" id="{{ $entry['id'] }}" placeholder="음성파일 내용을 입력해주세요.">{{ $entry['comment'] }}</textarea>
                                                                <button type="button" class="form-control btn-primary save" data-id="{{ $entry['id'] }}">저장</button>

                                                            @endif
                                                        @endforeach

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
                                                                                        {{--@include('partials.diagnosis',['entry' =>  $child])--}}
                                                                                        @if($child['name'])
                                                                                            <strong style="display:inline-block; width:100px;">{{ $child['name']['display'] }}</strong>
                                                                                        @endif

                                                                                        @if($child['use_image'] == 1)
                                                                                            @foreach($child['files'] as $file)
                                                                                                <a href="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $file['id'] }}&format=png&h_pos=10&bg_rgb=ffffff"
                                                                                                   class="diagnosis-thumbnail pull-right"
                                                                                                   data-toggle="lightbox"
                                                                                                   data-title="{{ $file['original'] }}"
                                                                                                   data-footer="{{ $file['created_at'] }} | {{ Helper::formatBytes($file['size']) }}"
                                                                                                   data-type="image"
                                                                                                   data-gallery="diagnosis-gallery"
                                                                                                >
                                                                                                    <img
                                                                                                            src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $file['id'] }}&format=png&h_pos=10&bg_rgb=ffffff"
                                                                                                            data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=860&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $file['id'] }}&format=png&h_pos=10&bg_rgb=ffffff"
                                                                                                            class="img-responsive" style="width:30px;height:30px;display:inline-block;">
                                                                                                </a>
                                                                                            @endforeach
                                                                                        @endif


                                                                                        @if($child['options'])
                                                                                            {!! Form::select('selected[]', \App\Helpers\Helper::getCodeArray($child['options_cd']), \App\Helpers\Helper::getCodePluck($child['selected']), ['class'=>'selected_cd', 'id'=>'', 'data-id'=>$child['id']]) !!}
                                                                                        @endif


                                                                                        @if($child['use_voice'] == 1)
                                                                                            @foreach($child['files'] as $file)
                                                                                                <button type="button" class="btn btn-circle btn-primary diagnosis-soundplay" data-toggle="tooltip" data-source="{{ $file['fullpath'] }}" data-mime="{{ $file['mime'] }}"  title="{{ $file['original'] }}"><i class="fa fa-play"></i></button>
                                                                                            @endforeach

                                                                                            <textarea name="comment" class="form-control" data-id="{{ $child['id'] }}" style="height:60px; margin-top:10px;" id="{{ $child['id'] }}" placeholder="음성파일 내용을 입력해주세요.">{{ $child['comment'] }}</textarea>
                                                                                            <button type="button" class="form-control btn-primary save" data-id="{{ $child['id'] }}">저장</button>

                                                                                        @endif
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

                        </fieldset>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection

@push( 'header-script' )
@endpush


@push( 'footer-script' )

<script>
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

        // .toggleClass('fa-play fa-pause');
        // if ( $obj.is( ".fa-play" ) ) {
        //         $obj.removeClass('fa-play').addClass('fa-pause');
        // } else {
        //         $obj.removeClass('fa-pause').addClass('fa-play');
        // }

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

    $('.save').on('click', function(){
        var diagnosis_id = $(this).data('id');
        var comment = $('#'+diagnosis_id).val();
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
            url : '/diagnosis/update-comment',
            type : 'post',
            dataType : 'json',
            data : {
                'diagnosis_id' : diagnosis_id,
                'comment' : comment
            },
            success : function (data) {
                notify.update('type', 'success');
                notify.update('title', '<strong>점검의견</strong>이 ');
                notify.update('message', '정상적으로 변경되었습니다.');
            },
            error : function (data) {
                notify.update('type', 'warning');
                notify.update('message', '오류가 발생했습니다.');
            }
        })
    });
</script>

@endpush
