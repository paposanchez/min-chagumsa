@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>진단검토 수정
                        <!-- <small>새로운 주문을 생성한다..</small> -->
                    </h2>

                    <ul class="actions">
                        <li>
                            <a href="/review" class="goback">
                                <i class="zmdi zmdi-view-list"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding">
                    <h3>
                        <span class="text-lg">
                                <span class="text-danger text-lighter">{{ $diagnosis->status->display() }}</span>
                                <span class="text-lighter">| </span>
                            {{ $diagnosis->chakey }}
                        </span>

                        <button id="issue" class="btn btn-primary pull-right" data-toggle="tooltip" title="진단 발급하기"
                                data-id="{{ $diagnosis->id }}" style="margin-left:10px;">진단 발급하기
                        </button>

                    </h3>

                    <div class="row">
                        <div class="col-xs-6">

                            <div class="block bg-white" style="margin-bottom:10px;">

                                <h4>주문정보</h4>
                                <ul class="list-group">

                                    <li class="list-group-item no-border"><span>주문자명</span> <em
                                                class="pull-right">{{ $diagnosis->order->orderer_name }}</em></li>
                                    <li class="list-group-item no-border"><span>주문자연락처</span> <em
                                                class="pull-right">{{ $diagnosis->order->orderer_mobile }}</em></li>
                                    <li class="list-group-item no-border"><span>상품명</span> <em
                                                class="pull-right">{{ $diagnosis->orderItem->item->name }}</em></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="block bg-white" style="margin-bottom:10px;">
                                <h4>차량정보</h4>
                                <ul class="list-group">
                                    <li class="list-group-item no-border"><span>차량명</span> <em
                                                class="pull-right">{{ $order->getCarFullName()  }}</em></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    {!! Form::model($diagnosis, ['method' => 'PATCH','route' => ['review.update', $diagnosis->id], 'class'=>'form-horizontal', 'id'=>'frm', 'enctype'=>"multipart/form-data"]) !!}
                    <fieldset>
                        {{--<div class="form-group ">--}}
                            {{--<label for="inputSubject"--}}
                                   {{--class="control-label col-md-2">자동차 등록증</label>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<img--}}
                                        {{--name="picture"--}}
                                        {{--src="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url=http://cdn.chagumsa.com/diagnosis/{{ $vin_number_picture->file->id }}"--}}
                                        {{--class="img-responsive picture"--}}
                                        {{--style="width:300px;height:200px;display:inline-block;" data-id="{{ $vin_number_picture->file->id }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group {{ $errors->has('vin_number') ? 'has-error' : '' }}">
                            <label for="inputSubject"
                                   class="control-label col-md-2">차대번호</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="차대번호를 입력해주세요."
                                       name="vin_number" id="vinNumber" required value="{{ old('vin_number') }}">
                                @if ($errors->has('vin_number'))
                                    <span class="help-block">
                                                        {{ $errors->first('vin_number') }}
                                                </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group ">--}}
                            {{--<label for="inputSubject"--}}
                                   {{--class="control-label col-md-2">자동차 계기</label>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<img--}}
                                        {{--name="picture"--}}
                                        {{--src="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url=http://cdn.chagumsa.com/diagnosis/{{ $mileage_picture->file->id }}"--}}
                                        {{--class="img-responsive picture"--}}
                                        {{--style="width:300px;height:200px;display:inline-block;" data-id="{{ $mileage_picture->file->id }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group {{ $errors->has('mileage') ? 'has-error' : '' }}">
                            <label for="inputSubject"
                                   class="control-label col-md-2">주행거리</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="주행거리를 입력해주세요."
                                       name="mileage" id="mileageInput" required value="{{ old('mileage') }}">
                                @if ($errors->has('mileage'))
                                    <span class="help-block">
                                                        {{ $errors->first('mileage') }}
                                                </span>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection


@push( 'footer-script' )
    <script type="text/javascript">
        $(document).on('click', '#issue', function(){
            if(confirm('빌급 후에는 수정 할 수 없습니다.\n진단 발급을 진행하시겠습니까?')){
                $('#frm').submit();
            }
        });
    </script>
@endpush
