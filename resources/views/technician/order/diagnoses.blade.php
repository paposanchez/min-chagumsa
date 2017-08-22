@extends( 'technician.layouts.blank' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.order')])
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
                    <input type="text" class="form-control" placeholder="" value="{{ $order->car->vin_number ? $order->car->vin_number : '' }}" style="background-color: #fff;" disabled>
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
                    <input type="text" class="form-control" placeholder="" value="{{ $order->reservation->reservation_at->format('Y년 m월 d일') }}" style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    진단시작 / 진단 완료
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{$entrys['diagnose_at']}} / {{$entrys['diagnosed_at']}}" style="background-color: #fff;" disabled>
                </div>
            </div>
        </div>


    </div>

    @foreach($entrys['entrys'] as $details)
        <div class="row drow-box">
            <div class="col-md-2"><h5>{{ $details['name']['display'] }}</h5></div>
            <div class="col-md-10 drow-left">
                @foreach($details['entrys'] as $detail)
                    <div class="row drow-bottom drow-bmargin">
                        <label for="inputName" class="control-label col-md-1 no-padding text-center col-centered">
                            점검항목
                        </label>
                        <div class="col-md-2 no-padding">
                            <input type="text" class="form-control" placeholder="" value="{{ $detail['name']['display'] }}" style="background-color: #fff;" disabled>
                        </div>

                        <div class="col-md-9 drow-box">
                            @foreach($detail['entrys'] as $item)
                                <div class="row">
                                    <div class="col-md-6 no-padding">
                                        @if($item['options'] != null)
                                            <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                                <label for="inputName" class="control-label col-md-6 text-left">
                                                    {{ \App\Helpers\Helper::getCodeName($item['options_cd']) }}
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="" value="선택된 값 = {{ $item['selected'] }}" style="background-color: #fff;" disabled>
                                                </div>
                                            </div>
                                        @elseif($item['use_image'] != 0)

                                            <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                                <label for="inputName" class="control-label col-md-6 text-left">
                                                    {{ $item['description'] }}
                                                </label>
                                                <div class="col-md-6">
                                                    {{--<input type="text" class="form-control" placeholder="" value="{{ $item['description'] }}" style="background-color: #fff;" disabled>--}}
                                                    <div class='cert_box_cont_img'>
                                                        <img src="http://fakeimg.pl/100x50/" alt='차량 이미지'>
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
                                                <label for="inputName" class="control-label col-md-6 text-left">
                                                    플레이어
                                                </label>
                                                <div class="col-md-6">
                                                    <video width="200" height="30" controls>
                                                    </video>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 no-padding">
                                        @if(count($detail['children']) > 0)
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
                                        @else
                                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                        @endif
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

    @endforeach

    <div class="row">
        <div class="col-md-12 text-center">
            <button type="button" id="self-close" class="btn btn-primary">닫기</button>
        </div>
    </div>


    <div class="modal fade bs-example-modal-lg in purchase-modal" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="insurance-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg form-group">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">점검 이미지</h4>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <td colspan="2" class="text-center">
                                <a href="javascript:void(0);" class="thumbnail" id="insurance-win">
                                    <img src="" id="dia-img">
                                </a>
                            </td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>




                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="image-modal-close">닫기</button>
                </div>
            </div>
        </div>
    </div>

</div><!-- container -->
@endsection

@push( 'footer-script' )
<script type="text/javascript">
    //todo 이미지 모달창 띄움 처리 해야 함.

    $(function() {
        $("#self-close").on("click", function(){
            window.close();
        });

        $('#image-modal').on("click", function(){
            var img_url = $(this).data('url');
            if(img_url){
                $("#dia-img").attr("src", img_url);
                $("image-modal").modal();
            }
        });

        $("#image-modal-close").on("click", function(){
            $("#dia-img").attr("src", '');
        });
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





