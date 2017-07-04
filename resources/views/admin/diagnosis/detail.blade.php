@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12" >
            {!! Form::model($order, ['method' => 'PATCH','route' => ['diagnosis.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
            <fieldset>

                @foreach($entrys['entrys'] as $details)
                    <h3>{{ $details['name'] }}</h3>
                    @foreach($details['entrys'] as $detail)
                        <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                            {{--<label for="inputId" class="control-label col-md-3">{{ trans('admin/board.id') }}</label>--}}
                            <label for="inputId" class="control-label col-md-3">점검 항목</label>
                            <div class="col-md-3">
                                <p class='form-control-static'>{{ $detail['name'] }}</p>
                            </div>
                        </div>

                        @if($detail['children'])
                            @foreach($detail['children'] as $child)
                                <h5>{{ $child['name'] }}</h5>
                                {{--@foreach($detail['children'] as $children_detail)--}}

                                {{--@endforeach--}}
                            @endforeach


                        @endif

                        @foreach($detail['entrys'] as $items)
                            @if($items['use_image'] == 0 && $items['use_voice'] == 0)
                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    {{--<label for="inputId" class="control-label col-md-3">{{ trans('admin/board.id') }}</label>--}}
                                    <label for="inputId" class="control-label col-md-3">{{ $items['options_cd'] }}</label>
                                    <div class="col-md-3">
                                        <p class='form-control-static'>코드 있다</p>
                                        {{--<p class='form-control-static'>{{ $items['use_image']['files'] }}</p>--}}
                                    </div>
                                </div>
                            @endif
                            @if($items['use_image'] == 1)
                                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                                    {{--<label for="inputId" class="control-label col-md-3">{{ trans('admin/board.id') }}</label>--}}
                                    <label for="inputId" class="control-label col-md-3">참고 사진</label>
                                    <div class="col-md-3">
                                        <p class='form-control-static'>사진 있다</p>
                                        {{--<p class='form-control-static'>{{ $items['use_image']['files'] }}</p>--}}
                                    </div>
                                </div>
                            @endif
                            @if($items['use_image'] == 1)
                            @endif
                        @endforeach

                    @endforeach

                    {{--<div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">--}}
                        {{--<label for="inputId" class="control-label col-md-3">{{ trans('admin/board.id') }}</label>--}}
                        {{--<label for="inputId" class="control-label col-md-3">제목</label>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<p class='form-control-static'></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="input" class="control-label col-md-3">{{ trans('admin/board.created_at') }}</label>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<p class='form-control-static'>2017-07-03</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                @endforeach




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





