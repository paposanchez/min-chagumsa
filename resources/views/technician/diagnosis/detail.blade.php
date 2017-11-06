@extends( 'technician.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.certificate')])
@endsection

@section( 'content' )
    <div class="container-fluid">
        <h3>
            <span class="text-lg">
                    <span class="text-danger text-lighter">{{ $order->status->display() }}</span>
                    <span class="text-lighter">| </span>
                {{ $order->getOrderNumber() }}
            </span>
            <a href="/order/{{ $order->id }}" target="_blank" class="btn btn-default pull-right"
               style="margin-left:10px;">주문보기</a>

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
                                        <col width="20%">
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
                                                @foreach($entry['entrys'] as $entry)
                                                    @if($entry['name'])
                                                        <strong style="display:inline-block; width:100px;">{{ $entry['name']['display'] }}</strong>
                                                    @endif

                                                    @if($entry['use_image'] == 1)
                                                        <div class="diagnosis-uploader-container">
                                                            @each("partials.diagnosis-image", $entry['files'], 'file')
                                                        </div>
                                                    @endif


                                                    @if($entry['options'])
                                                        <p class="form-control-static">{{ \App\Helpers\Helper::getCodeName($entry['selected']) }}</p>
                                                    @endif


                                                    @if($entry['use_voice'] == 1)
                                                        @foreach($entry['files'] as $file)
                                                            <button type="button"
                                                                    class="btn btn-circle btn-primary diagnosis-soundplay"
                                                                    data-toggle="tooltip"
                                                                    data-source="{!! str_replace(array("http://admin", "http://cert", "http://bcs", "http://www", "http://image", "http://tech"), "http://cdn", url('/')) !!}/diagnosis/{{ $file['id'] }}"
                                                                    data-mime="{{ $file['mime'] }}"
                                                                    title="{{ $file['original'] }}"><i
                                                                        class="fa fa-play"></i></button>
                                                        @endforeach

                                                        <textarea name="comment" class="form-control"
                                                                  data-id="{{ $entry['id'] }}"
                                                                  style="height:60px; margin-top:10px;"
                                                                  id="{{ $entry['id'] }}" placeholder="음성파일 내용을 입력해주세요."
                                                                  readonly>{{ $entry['comment'] }}</textarea>


                                                    @endif
                                                @endforeach


                                                @if(isset($entry['children']))
                                                    <table class="">
                                                        <col width="20%">
                                                        <col width="*">
                                                        <tbody class="no-border">
                                                        @foreach($entry['children'] as $children)
                                                            <tr>
                                                                <th class="">{{ $children['name']['display'] }}</th>
                                                                <td>
                                                                    <ul class="list-unstyled no-margin">
                                                                        @foreach($children['entrys'] as $child)
                                                                            <li class="clearfix">
                                                                                @if($child['name'])
                                                                                    <strong style="display:inline-block; width:100px;">{{ $child['name']['display'] }}</strong>
                                                                                @endif

                                                                                @if($child['use_image'] == 1)
                                                                                    <div class="diagnosis-uploader-container">
                                                                                        @each("partials.diagnosis-image", $child['files'], 'file')
                                                                                    </div>
                                                                                @endif

                                                                                @if($child['options'])
                                                                                    <p class="form-control-static">{{ \App\Helpers\Helper::getCodeName($child['selected']) }}</p>
                                                                                @endif


                                                                                @if($child['use_voice'] == 1)
                                                                                    @foreach($child['files'] as $file)
                                                                                        <button type="button"
                                                                                                class="btn btn-circle btn-primary diagnosis-soundplay"
                                                                                                data-toggle="tooltip"
                                                                                                data-source="{!! str_replace(array("http://admin", "http://cert", "http://bcs", "http://www", "http://image", "http://tech"), "http://cdn", url('/')) !!}/diagnosis/{{ $file['id'] }}"
                                                                                                data-mime="{{ $file['mime'] }}"
                                                                                                title="{{ $file['original'] }}">
                                                                                            <i
                                                                                                    class="fa fa-play"></i>
                                                                                        </button>
                                                                                    @endforeach

                                                                                    <textarea name="comment"
                                                                                              class="form-control"
                                                                                              data-id="{{ $child['id'] }}"
                                                                                              style="height:60px; margin-top:10px;"
                                                                                              id="{{ $entry['id'] }}"
                                                                                              placeholder="음성파일 내용을 입력해주세요."
                                                                                              readonly>{{ $child['comment'] }}</textarea>
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
        //진단 음성파일
        $('.diagnosis-soundplay').on('click', function (e) {

            e.preventDefault();
            var $obj = $(this).find('.fa');

            if ($obj.hasClass("fa-play")) {
                $('.diagnosis-soundplay .fa-pause').each(function () {
                    $(this).removeClass('fa-pause').addClass('fa-play');
                    if (diagnosis_audio instanceof Audio) {
                        diagnosis_audio.pause();
                    }
                    diagnosis_audio = null;
                });
                var s = $obj.data('source');
                diagnosis_audio = new Audio(s);
                diagnosis_audio.play();
                $obj.removeClass('fa-play').addClass('fa-pause');
            } else {
                diagnosis_audio.pause();
                $obj.removeClass('fa-pause').addClass('fa-play');
            }
        });

    </script>

@endpush
