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
                                        @unless(count($lated_inquire) >0)
                                        <div class="list-group-item no-result">{{ trans('common.no-result') }}</div>
                                        @endunless

                                        @foreach($lated_inquire as $n => $data)
                                        <a href="{{ url('/post/'.$data->id.'/edit') }}" class="list-group-item">
                                                @if($data->is_answered == 1)
                                                <span class="label label-success">답변완료</span>
                                                @else
                                                <span class="label label-info">답변완료</span>
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
                                <!-- <div class="panel-heading">
                                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 최근 게시물
                                        <span class="pull-right more-click" data-url="{{ url('post')}}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                                </div> -->

                                <div class="panel-heading dark">
                                        <i class="fa fa-file-text-o"></i> 최근 게시물
                                        <a href="{{ url('post')}}" class="pull-right">더보기</a>
                                </div>


                                <div class="list-group">

                                        @unless(count($lated_post) >0)
                                        <div class="list-group-item no-result">{{ trans('common.no-result') }}</div>
                                        @endunless

                                        @foreach($lated_post as $n => $data)
                                        <a href="{{ url('/post/'.$data->id.'/edit') }}" class="list-group-item">
                                                {{ $data->subject }}

                                                <small class="pull-right">
                                                        {{ $data->created_at->format('m-d H:i') }}
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
                                                <span class="label label-default" style="width:90px;display:inline-block;">{{ $data->status->display() }}</span>

                                                {{ $data->getOrderNumber() }}

                                                <small class="pull-right">
                                                        {{ $data->updated_at ? $data->updated_at->format('m-d H:i') : $data->created_at->format('m-d H:i') }}
                                                </small>
                                        </a>
                                        @endforeach

                                </div>

                        </div>
                </div>



        </div>


</div>

@endsection


@push( 'footer-script' )
<script type="text/javascript">
$('document').ready(function () {

});

</script>
@endpush
