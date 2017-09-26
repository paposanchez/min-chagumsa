@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="row">
            {{-- 최근 게시물 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading dark">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> BCS 공지사항
                        <a href="{{ url('notice')}}" class="pull-right">더보기</a>
                    </div>

                    <div class="list-group">
                        @unless(count($lated_post) > 0)
                            <div class="list-group-item no-result">{{ trans('common.no-result') }}</div>
                        @endunless

                        @foreach($lated_post as $n => $data)
                            <a href="{{ url('/notice/'.$data->id) }}" class="list-group-item">
                                            <span class="label label-success"
                                                  style="width:70px;display:inline-block;">{{ $data->board->name }}</span>
                                {{ $data->subject }}


                                <small class="pull-right">
                                    {{ $data->created_at->format('Y-m-d') }}
                                </small>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- 최근 정산현황 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading dark">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 최근 진단현황
                        <a href="{{ url('diagnosis')}}" class="pull-right">더보기</a>
                    </div>
                    <div class="list-group">
                        @unless(count($lated_order) > 0)
                            <div class="list-group-item no-result">{{ trans('common.no-result') }}</div>
                        @endunless

                        @foreach($lated_order as $n => $data)

                            <a href="{{ url('/order/'.$data->id) }}" class="list-group-item">
                                            <span class="label
                                                @if($data->status_cd == 100)
                                                    label-default
                                                @elseif($data->status_cd == 106)
                                                    label-primary
                                                @else
                                                    label-info
                                                @endif
                                                    "
                                                  style="width:60px;display:inline-block;">{{ $data->status->display() }}</span>
                                {{ $data->getOrderNumber() }}


                                <small class="pull-right">
                                    {{ $data->created_at->format('Y-m-d') }}
                                </small>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading dark">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 엔지니어 리스트
                        <a href="{{ url('user')}}" class="pull-right">더보기</a>
                    </div>
                    <div class="list-group">
                        @unless(count($lated_engineer) > 0)
                            <div class="list-group-item no-result">{{ trans('common.no-result') }}</div>
                        @endunless

                        @foreach($lated_engineer as $n => $data)
                            <a href="{{ url('/user/'.$data->id.'/edit') }}" class="list-group-item">
                                <span class="label label-info"
                                      style="width:70px;display:inline-block;">{{ $data->id }}</span>
                                {{ $data->name }}


                                <small class="pull-right">
                                    {{ $data->created_at->format('Y-m-d') }}
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
    $(function () {
        $(".more-click").on("click", function () {
            var link = $(this).data("url");
            if (link) {
                location.href = link;
            }
        });

    });
</script>
@endpush