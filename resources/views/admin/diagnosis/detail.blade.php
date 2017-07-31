@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12" >
            <h3>기본 정보</h3>
            {!! Form::model($order, ['method' => 'PATCH','route' => ['diagnosis.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
            <input type="hidden" name="order_status" id="order_status">
            <input type="hidden" name="id" value="{{ $order->id }}">


            <div class="form-group">
                {{--{{ dd($entrys) }}--}}
                <!-- 유형선택 -->
                <label for="inputName" class="control-label col-md-2 text-left">주문번호</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ $entrys['order_num'] }}" style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">차대번호</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ $order->car->vin_number }}" style="background-color: #fff;" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="control-label col-md-2 text-left">
                    차량번호
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ $entrys['car_number'] }}" style="background-color: #fff;" disabled>
                </div>

                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    차량명
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ $entrys['car_name'] }}" style="background-color: #fff;" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="control-label col-md-2 text-left">
                    정비소
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ $order->garageInfo->name }}" style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    정비소 전화번호
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ $order->garageInfo->tel }}" style="background-color: #fff;" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="control-label col-md-2 text-left">
                    엔지니어
                </label>
                <div class="col-md-4">
                    {{-- todo 엔지니어 명으로 추후 변경 --}}
                    <input type="text" class="form-control" placeholder="" value="{{ $order->engineer->name }}" style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    엔지니어 전화번호
                </label>
                <div class="col-md-4">
                    {{-- todo 엔지니어 전화번호 추후 변경 --}}
                    <input type="text" class="form-control" placeholder="" value="{{ $order->engineer->mobile }}" style="background-color: #fff;" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="control-label col-md-2 text-left">
                    입고 예약일
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ \Carbon\Carbon::parse($order->reservation->reservation_at)->format('Y년 m월 d일') }}" style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    진단시작 / 진단 완료
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{$entrys['diagnose_at']}} / {{$entrys['diagnosed_at']}}" style="background-color: #fff;" disabled>
                </div>
            </div>




            <fieldset>
                @foreach($entrys['entrys'] as $details)
                    <h3>{{ $details['name']['display'] }}</h3>
                    @foreach($details['entrys'] as $detail)
                    <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-2 text-left">
                            점검 항목
                        </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="" value="{{ $detail['name']['display'] }}" style="background-color: #fff;" disabled>
                        </div>
                    </div>

                        @foreach($detail['entrys'] as $item)

                            @if($item['options'] != null)
                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    <label for="inputName" class="control-label col-md-2 text-left">
                                        {{ \App\Helpers\Helper::getCodeName($item['options_cd']) }}
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="" value="선택된 값 = {{ $item['selected'] }}" style="background-color: #fff;" disabled>
                                    </div>
                                </div>
                            @elseif($item['use_image'] != 0)

                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    <label for="inputName" class="control-label col-md-2 text-left">
                                        {{ $item['description'] }}
                                    </label>
                                    <div class="col-md-4">
                                        {{--<input type="text" class="form-control" placeholder="" value="{{ $item['description'] }}" style="background-color: #fff;" disabled>--}}
                                        <div class='cert_box_cont_img'>
                                            <img src="http://fakeimg.pl/200x100/" alt='차량 이미지'>
                                        </div>
                                    </div>
                                </div>
                            @elseif($item['use_voice'] != 0)
                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    {{--<label for="inputId" class="control-label col-md-3">플레이어</label>--}}
                                    {{--<div class="col-md-3">--}}
                                        {{--<video width="200" height="30" controls>--}}
                                        {{--</video>--}}
                                    {{--</div>--}}
                                    <label for="inputName" class="control-label col-md-2 text-left">
                                        플레이어
                                    </label>
                                    <div class="col-md-4">
                                        <video width="200" height="30" controls>
                                        </video>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        @foreach($detail['children'] as $child)
                            <h5>• {{ $child['name']['display'] }}</h5>

                            @foreach($child['entrys'] as $child_item)

                                @if($child_item['options'] )
                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    <label for="inputName" class="control-label col-md-2 text-left">
                                        {{ \App\Helpers\Helper::getCodeName($child_item['options_cd']) }}
                                        {{--{{ $child_item['name']['display'] }}--}}
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="" value="선택된 값 = {{ $child_item['selected'] }}" style="background-color: #fff;" disabled>
                                    </div>
                                </div>
                                @elseif($child_item['use_image'] != 0)
                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    <label for="inputId" class="control-label col-md-3">참고 사진</label>
                                    <div class="col-md-3">
                                        <p class='form-control-static'>{{ $child_item['description'] }}</p>
                                    </div>
                                </div>
                                @elseif($child_item['use_voice'] != 0)
                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    <label for="inputId" class="control-label col-md-3">플레이어</label>
                                    <div class="col-md-3">
                                        <p class='form-control-static'>파일 있다</p>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach

                    <hr>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <a href="{{ route('diagnosis.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                        <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}" type="submit">{{ trans('common.button.save') }}</button>
                    </div>
                </div>

            </fieldset>


            {{--{!! Form::close() !!}--}}




            {{--<div class="row">--}}

                {{--<div class="col-md-6">--}}

                    {{--<a href="" class="btn btn-primary" style="margin-left: 15px;">주문목록</a>--}}

                {{--</div>--}}

                {{--<div class="col-sm-6 text-right">--}}

                        {{--<a href="" class="btn btn-default" style="margin-right: 15px;">진단 결과 보기</a>--}}

                {{--</div>--}}

            {{--</div>--}}
        </div>
    </div>

</div><!-- container -->
@endsection

@push( 'footer-script' )
<script type="text/javascript">
    $(function() {

    });

    /**
     * 최종 tab panel 클릭 history 처리
     */
    $("ul.nav-pills > li >a").on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
    })

    var hash = window.location.hash;
    $("#certi_tab a[href='" + hash + "']").tab('show');
</script>
@endpush





