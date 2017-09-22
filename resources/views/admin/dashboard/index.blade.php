@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin')])
@endsection

@section( 'content' )

<div class="container-fluid">

        <div class="row">

                {{-- 최근 문의사항 --}}
                <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-primary">
                                <div class="panel-heading dark">
                                        <i class="fa fa-file-text-o"></i> 최근 1:1문의
                                        <a href="{{ url('post')}}" class="pull-right">더보기</a>
                                </div>


                                <div class="list-group">
                                        @unless(count($lated_inquire) > 0)
                                        <div class="list-group-item no-result">{{ trans('common.no-result') }}</div>
                                        @endunless

                                        @foreach($lated_inquire as $n => $data)
                                        <a href="{{ url('/post/'.$data->id.'/edit') }}" class="list-group-item">
                                                @if($data->is_answered)
                                                <span class="label label-success" style="width:60px;display:inline-block;">답변완료</span>
                                                @else
                                                <span class="label label-info" style="width:60px;display:inline-block;">미답변</span>
                                                @endif

                                                {{ $data->subject }}

                                                <small class="pull-right">
                                                        {{ $data->created_at->format('m-d H:i') }}
                                                </small>
                                        </a>
                                        @endforeach

                                </div>
                        </div>

                        <div class="panel panel-primary ">

                                <div class="panel-heading dark">
                                        <i class="fa fa-file-text-o"></i> 최근 인증서
                                        <a href="{{ url('order?status_cd=109')}}" class="pull-right">더보기</a>
                                </div>

                                <div class="list-group">

                                        @unless(count($certificates) > 0)
                                        <div class="list-group-item no-result">등록된 인증서가 없습니다.</div>
                                        @endunless

                                        @foreach($certificates as $n => $data)
                                        <a href="{{ url('/order/'.$data->id) }}" class="list-group-item">

                                                <span class="label label-success" style="width:60px;display:inline-block;">{{ $data->certificates->certificate_grade->display() }}</span>

                                                {{ $data->getOrderNumber() }}

                                                <small class="pull-right">
                                                        {{ $data->certificates->updated_at->format('m-d H:i') }}
                                                </small>
                                        </a>
                                        @endforeach

                                </div>

                        </div>
                </div>

                {{-- 최근 게시물 --}}
                <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-primary">
                                <div class="panel-heading dark">
                                        <i class="fa fa-file-text-o"></i> 최근 주문
                                        <a href="{{ url('order')}}" class="pull-right">총 {{ number_format($total_diagnosis) }} 개</a>
                                </div>

                                <div class="list-group">

                                        @unless(count($lated_diagnosis) >0)
                                        <div class="list-group-item no-result">{{ trans('common.no-result') }}</div>
                                        @endunless

                                        @foreach($lated_diagnosis as $n => $data)
                                        <a href="{{ url('order', [$data->id]) }}" class="list-group-item">
                                                <span class="label
                                                @if($data->status_cd == 100)
                                                label-default
                                                @elseif($data->status_cd == 106)
                                                label-primary
                                                @else
                                                label-info
                                                @endif

                                                " style="width:60px;display:inline-block;">{{ $data->status->display() }}</span>

                                                {{ $data->getOrderNumber() }}

                                                <small class="pull-right">
                                                        {{ $data->updated_at ? $data->updated_at->format('m-d H:i') : $data->created_at->format('m-d H:i') }}
                                                </small>
                                        </a>
                                        @endforeach

                                </div>

                        </div>
                </div>


                {!! Form::open(['url' => 'diagnosis/upload', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}
                        <input type="text" id="user_id" name="user_id" value="" placeholder="정비사번호">
                        <input type="text" id="order_id" name="order_id" value="" placeholder="주문번호">
                        <input type="text" id="diagnosis_id" name="diagnosis_id" value="" placeholder="진단번호">
                        <button type="submit">update</button>
                {!! Form::close() !!}

        </div>


</div>

@endsection


@push( 'footer-script' )
<script type="text/javascript">
$('document').ready(function () {

});

</script>
@endpush
