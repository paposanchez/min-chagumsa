@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12" >

            {{--{!! Form::open(['method' => 'POST','route' => ['post.store'], 'class'=>'form-horizontal', 'id'=>'frmPost', 'enctype'=>"multipart/form-data"]) !!}--}}

            <div class="form-group " >
                {{--<label for="inputSubject" class="control-label col-md-3">{{ trans('admin/post.subject') }}</label>--}}
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon">주문번호</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->datekey }}-{{ $order->car_number }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">주문상태</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->status_cd }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">주문자</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->orderer_name }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">차량번호</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->car_number }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">모델명</span>
                        <input type="text" class="form-control" placeholder="" value="" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">색상</span>
                        <input type="text" class="form-control" placeholder="" value="" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">옵션</span>
                        <input type="text" class="form-control" placeholder="" value="" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">주문일 / 입고일</span>
                        <input type="text" class="form-control" placeholder="" value="" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">진단일 / 인증서 발급일</span>
                        <input type="text" class="form-control" placeholder="" value="" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">정비사 / 기술사</span>
                        <input type="text" class="form-control" placeholder="" value="" style="background-color: #fff;" disabled>
                    </div>
                </div>
            </div>
            {{--{!! Form::close() !!}--}}
        </div>
    </div>

    <br>
    <div class="row">

        <div class="col-md-6">

            <a href="{{ route('order.index') }}" class="btn btn-primary" style="margin-left: 15px;">주문목록</a>

        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('order.index') }}" class="btn btn-default" style="margin-right: 15px;">진단 결과 보기</a>
        </div>

    </div>


</div><!-- container -->
@endsection






