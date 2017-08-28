@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row drow-box">

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
                        {{--<input type="text" class="form-control" placeholder="" value="{{ $order->car->vin_number ? $order->car->vin_number : '' }}" style="background-color: #fff;" disabled>--}}
                        <input type="text" class="form-control" placeholder="" value="{{ $order->car ? $order->car->vin_number : '' }}" style="background-color: #fff;" disabled>
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

        <div class="row" id="diagnosis-info"><div class="col-md-12 text-center alert alert-info"><h1><span class="fa fa-arrow-circle-down"></span> 차량 점검 상세 내역</h1></div></div>

        <div class="row">
            @foreach($entrys['entrys'] as $details)
                <div class="row drow-box">
                    <div class="col-md-2 text-center"><h3>{{ $details['name']['display'] }}</h3></div>
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


                                            <div class="col-md-8 img-block">
                                                @if($item['options'] && $item['use_image'])
                                                    <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                                        <label for="inputName" class="control-label col-md-4 text-left">
                                                            {{ $item['description'] }}
                                                        </label>
                                                        <div class="col-md-6">
                                                            {{--<input type="text" class="form-control" placeholder="" value="{{ $item['description'] }}" style="background-color: #fff;" disabled>--}}
                                                            <div class='cert_box_cont_img' >
                                                                @if($item['files'])
                                                                    {{--<img src="http://www.localhost:8000/file/diagnosis-download/{{ $item['id'] }}" alt='차량 이미지' id="imgSrc" data-url="http://www.localhost:8000/file/diagnosis-download/{{ $item['id'] }}" width="100px;">--}}
                                                                    <img class="img" src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $item['id'] }}&format=png&h_pos=10&bg_rgb=ffffff" alt='차량 이미지' id="imgSrc" data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $item['id'] }}&format=png&h_pos=10&bg_rgb=ffffff">
                                                                @else
                                                                    <img src="http://fakeimg.pl/100x50/" alt='차량 이미지'>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                                        <label for="inputName" class="control-label col-md-4 text-left">
                                                            {{ \App\Helpers\Helper::getCodeName($item['options_cd']) }}
                                                        </label>
                                                        <div class="col-md-6">
                                                            {!! Form::select('selected[]', \App\Helpers\Helper::getCodeArray($item['options_cd']), \App\Helpers\Helper::getCodePluck($item['selected']), ['class'=>'form-control selected_cd', 'id'=>'', 'data-id'=>$item['id']]) !!}
                                                        </div>
                                                    </div>
                                                @elseif($item['options'] != null)
                                                    <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                                        <label for="inputName" class="control-label col-md-4 text-left">
                                                            {{ \App\Helpers\Helper::getCodeName($item['options_cd']) }}
                                                        </label>
                                                        <div class="col-md-6">
                                                            {!! Form::select('selected[]', \App\Helpers\Helper::getCodeArray($item['options_cd']), \App\Helpers\Helper::getCodePluck($item['selected']), ['class'=>'form-control selected_cd', 'id'=>'', 'data-id'=>$item['id']]) !!}
                                                        </div>
                                                    </div>
                                                @elseif($item['use_image'] != 0)

                                                    <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                                        <label for="inputName" class="control-label col-md-4 text-left">
                                                            {{ $item['description'] }}
                                                        </label>
                                                        <div class="col-md-6">
                                                            {{--<input type="text" class="form-control" placeholder="" value="{{ $item['description'] }}" style="background-color: #fff;" disabled>--}}
                                                            <div class='cert_box_cont_img'>
                                                                @if($item['files'])
                                                                    {{--<img src="http://www.localhost:8000/file/diagnosis-download/{{ $item['id'] }}" alt='차량 이미지' id="imgSrc" data-url="http://www.localhost:8000/file/diagnosis-download/{{ $item['id'] }}" width="100px;">--}}
                                                                    <img class="img" src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $item['id'] }}&format=png&h_pos=10&bg_rgb=ffffff" alt='차량 이미지' id="imgSrc" data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $item['id'] }}&format=png&h_pos=10&bg_rgb=ffffff">
                                                                @else
                                                                    <img src="http://fakeimg.pl/100x50/" alt='차량 이미지'>
                                                                @endif

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
                                                        <label for="inputName" class="control-label col-md-4 text-left">
                                                            플레이어
                                                        </label>
                                                        <div class="col-md-6">
                                                            <video width="200" height="30" controls>
                                                            </video>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    @if(count($detail['children']) > 0)
                                        <div class="row">
                                            <div class="col-md-8 img-block">
                                                @foreach($detail['children'] as $child)

                                                    <div class="row">
                                                        <h5>• {{ $child['name']['display'] }}</h5>

                                                        @foreach($child['entrys'] as $child_item)

                                                            @if($child_item['options'] && $child_item['use_image'])
                                                                <table class="table table-bordered">
                                                                    <colgroup>
                                                                        <col width="35%">
                                                                    </colgroup>
                                                                    <tbody>
                                                                    <tr>
                                                                        <th style="padding-left: 25px;">{{ \App\Helpers\Helper::getCodeName($child_item['options_cd']) }}</th>
                                                                        {{--<td><input type="text" class="form-control" placeholder="" value="선택된 값 = {{ $child_item['selected'] }}" style="background-color: #fff;" disabled></td>--}}
                                                                        <td>
                                                                            {!! Form::select('selected[]', \App\Helpers\Helper::getCodeArray($child_item['options_cd']), \App\Helpers\Helper::getCodePluck($child_item['selected']), ['class'=>'form-control selected_cd', 'id'=>'', 'data-id'=>$child_item['id']]) !!}
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>

                                                                <table class="table table-bordered">
                                                                    <colgroup>
                                                                        <col width="35%">
                                                                    </colgroup>
                                                                    <tbody>
                                                                    <tr>
                                                                        <th style="padding-left: 25px;">{{ $child_item['description'] }}</th>
                                                                        <td>
                                                                            @if($child_item['files'])
                                                                                <img class="img" src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $child_item['id'] }}&format=png&h_pos=10&bg_rgb=ffffff" alt='차량 이미지' id="imgSrc" data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $child_item['id'] }}&format=png&h_pos=10&bg_rgb=ffffff" width="100px;">
                                                                                {{--<img src="http://www.chagumsa.com/file/diagnosis-download/{{ $child_item['id'] }}" alt='차량 이미지' id="imgSrc" data-url="http://www.chagumsa.com/file/diagnosis-download/{{ $item['id'] }}">--}}
                                                                            @else
                                                                                <img src="http://fakeimg.pl/100x50/" alt='차량 이미지'>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            @elseif($child_item['options'] )

                                                                <table class="table table-bordered">
                                                                    <colgroup>
                                                                        <col width="35%">
                                                                    </colgroup>
                                                                    <tbody>
                                                                    <tr>
                                                                        <th style="padding-left: 25px;">{{ \App\Helpers\Helper::getCodeName($child_item['options_cd']) }}</th>
                                                                        {{--<td><input type="text" class="form-control" placeholder="" value="선택된 값 = {{ $child_item['selected'] }}" style="background-color: #fff;" disabled></td>--}}
                                                                        <td>
                                                                            {!! Form::select('selected[]', \App\Helpers\Helper::getCodeArray($child_item['options_cd']), \App\Helpers\Helper::getCodePluck($child_item['selected']), ['class'=>'form-control selected_cd', 'id'=>'', 'data-id'=>$child_item['id']]) !!}
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>

                                                            @elseif($child_item['use_image'] != 0)

                                                                <table class="table table-bordered">
                                                                    <colgroup>
                                                                        <col width="35%">
                                                                    </colgroup>
                                                                    <tbody>
                                                                    <tr>
                                                                        <th style="padding-left: 25px;">{{ $child_item['description'] }}</th>
                                                                        <td>
                                                                            @if($child_item['files'])
                                                                                <img class="img" src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $child_item['id'] }}&format=png&h_pos=10&bg_rgb=ffffff" alt='차량 이미지' id="imgSrc" data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $child_item['id'] }}&format=png&h_pos=10&bg_rgb=ffffff" width="100px;">
                                                                                {{--<img src="http://www.chagumsa.com/file/diagnosis-download/{{ $child_item['id'] }}" alt='차량 이미지' id="imgSrc" data-url="http://www.chagumsa.com/file/diagnosis-download/{{ $item['id'] }}">--}}
                                                                            @else
                                                                                <img src="http://fakeimg.pl/100x50/" alt='차량 이미지'>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>

                                                            @elseif($child_item['use_voice'] != 0)

                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th style="padding-left: 25px;">플레이어</th>
                                                                        <td>파일 있다</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>

                                                            @endif
                                                        @endforeach

                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

            @endforeach

            <a id="back-to-top" href="#diagnosis-info" class="btn btn-primary btn-md back-to-top" role="button" title="상단으로 가기" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
        </div>


        <div class="row">
            <div class="col-md-12 text-center">
                <button type="button" id="self-close" class="btn btn-primary">닫기</button>
            </div>
        </div>



        <!-- Modal -->
        <div id="pictureModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <img src="http://fakeimg.pl/350x200/" id="img" alt='차량 이미지' width="800px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push( 'footer-script' )
<script type="text/javascript">
    $(function() {
        $(".img-block").delegate(".img", "click", function () {
            var url = $(this).data('url');
            if(url){
                // todo 추후에 diagnosis_id 에 대한 image를 loop를 통해 추출
                $("#img").attr("src", url);

                $("#pictureModal").modal();
            }
        });

        $(".selected_cd").change(function(){
            var change_value = $(this).val();
            var diagnosis_id = $(this).data('id');
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/diagnosis/update-code',
                data : {
                    'id' : diagnosis_id,
                    'selected' : change_value
                },
                success : function (data){
//                    alert(JSON.stringify(data));
                    alert('코드가 정상적으로 변경되었습니다.');
                },
                error : function (data){
//                    alert(JSON.stringify(data));
                    alert('변경중 오류가 발생하였습니다.');
                }
            })
        })
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





