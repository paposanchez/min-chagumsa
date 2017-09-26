@extends( 'technician.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.dashboard')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="row">

            {{-- 인증서 대기목록 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading dark">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 인증서 대기 목록
                        <a href="{{ url('certificate')}}" class="pull-right">더보기</a>
                    </div>

                    <div class="list-group">
                        @unless(count($req_order) >0)
                            <div class="list-group-item no-result">인증서 발급대기 목록이 없습니다.</div>
                        @endunless

                        @foreach($req_order as $n => $data)
                            <a href="{{ url("order", [$data->id]) }}" class="list-group-item">
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

                                <small  class="pull-right">{{ $data->created_at->format('Y-m-d') }}</small>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- 인증서 발급완료 목록 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading dark">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 인증서 발급환황
                        <a href="{{ url('order')}}" class="pull-right">더보기</a>
                    </div>
                    <div class="list-group">
                        @unless(count($fin_order) >0)
                            <div class="list-group-item no-result">인증서 발급현황이 없습니다.</div>
                        @endunless

                        @foreach($fin_order as $n => $data)

                            <a href="{{ url("order", [$data->id]) }}" class="list-group-item">
                                            <span class="label label-success"
                                                  style="width:70px;display:inline-block;">{{ $data->status->display() }}</span>
                                {{ $data->getOrderNumber() }}


                                <smail class="pull-right">
                                    {{ $data->created_at->format('Y-m-d') }}
                                </smail>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            {{-- 공지사항 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading dark">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 공지사항
                        <a href="{{ url('notice')}}" class="pull-right">더보기</a>
                    </div>
                    <div class="list-group">
                        @unless(count($lated_post) >0)
                            <div class="list-group-item no-result">공지사항이 없습니다.</div>
                        @endunless

                        @foreach($lated_post as $n => $data)

                            <a href="{{ url("notice", ['id' => $data->id]) }}" class="list-group-item">
                                            <span class="label label-success"
                                                  style="width:70px;display:inline-block;">{{ $data->board->name }}</span>
                                {{ $data->subject }}
                                <small  class="pull-right">
                                    {{ $data->created_at->format('Y-m-d') }}
                                </small>
                            </a>
                        @endforeach
                    </div>
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