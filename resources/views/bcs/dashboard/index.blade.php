
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
                    <div class="panel-heading">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> BCS 공지사항
                        <span class="pull-right more-click" data-url="{{ url('notice')}}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="100px">
                            </colgroup>
                            <tbody>
                            @unless(count($lated_post) > 0)
                                <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                            @endunless

                            @foreach($lated_post as $n => $data)
                                <tr>
                                    <td class="">
                                        <a href="{{ url('/notice/'.$data->id) }}">{{ $data->subject }}</a>
                                    </td>

                                    <td class="">
                                        {{--{{ $data->created_at }}--}}
                                        {{ $data->created_at->format('Y-m-d') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- 최근 정산현황 --}}
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 최근 진단현황
                        <span class="pull-right more-click" data-url="{{ url('diagnosis')}}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="100px">
                            </colgroup>
                            <tbody>
                            @unless(count($lated_order) > 0)
                                <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                            @endunless

                            @foreach($lated_order as $n => $data)
                                <tr>
                                    <td class="">
                                        <a href="{{ url('/order/'.$data->id) }}">{{ $data->getOrderNumber() }}</a>
                                    </td>

                                    <td class="">
                                        {{ $data->created_at->format('Y-m-d') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="fa fa-file-text-o" style="padding-right: 5px;"></span> 엔지니어 리스트
                        <span class="pull-right more-click" data-url="{{ url('user')}}">more <i class="fa fa-fw fa-caret-right text-success"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <colgroup>
                                <col width="*">
                                <col width="100px">
                            </colgroup>
                            <tbody>


                            @foreach($lated_engineer as $n => $data)
                                <tr>
                                    <td class="">
                                        <a href="{{ url('/user/'.$data->id.'/edit') }}">{{ $data->name }}</a>
                                    </td>

                                    <td class="">
                                        {{ $data->created_at->format('Y-m-d') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push( 'footer-script' )
<script type="text/javascript">
    $(function(){
        $(".more-click").on("click", function(){
            var link = $(this).data("url");
            if(link){
                location.href = link;
            }
        });
    });
</script>
@endpush