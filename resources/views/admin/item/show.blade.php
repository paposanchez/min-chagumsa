@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.calculation')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::open(['method' => 'POST','url' => ['item/update'], 'class'=>'form-horizontal', 'id'=>'carForm', 'enctype'=>"multipart/form-data"]) !!}
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <fieldset>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-md-3">상품명</label>
                        <div class="col-md-6">
                            {{--<input type="text" class="form-control" placeholder="상품명"--}}
                                   {{--name="name" id="name" value="{{ $item->name }}">--}}
                            <p class="form-control-static">{{ $item->name }}</p>
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                    {{ $errors->first('name') }}
                                </span>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3">가격</label>
                        <div class="col-md-6">
                            {{--<input type="text" class="form-control" placeholder="가격"--}}
                                   {{--name="price" id="price" value="{{ $item->price }}">--}}
                            <p class="form-control-static">{{ $item->price }}</p>
                        </div>
                        @if ($errors->has('price'))
                            <span class="text-danger">
                                    {{ $errors->first('price') }}
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3">PG 수수료률</label>
                        <div class="col-md-6">
                            {{--<input type="text" class="form-control" placeholder=""--}}
                                   {{--name="commission" id="commission" value="{{ $item->commission }}">--}}
                            <p class="form-control-static">{{ $item->commission }}</p>
                        </div>
                        @if ($errors->has('commission'))
                            <span class="text-danger">
                                    {{ $errors->first('commission') }}
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3">보증료</label>
                        <div class="col-md-6">
                            {{--<input type="text" class="form-control" placeholder=""--}}
                                   {{--name="guarantee" id="guarantee" value="{{ $item->guarantee }}">--}}
                            <p class="form-control-static">{{ $item->guarantee }}</p>
                        </div>
                        @if ($errors->has('guarantee'))
                            <span class="text-danger">
                                    {{ $errors->first('guarantee') }}
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3">공임비용</label>
                        <div class="col-md-6">
                            {{--<input type="text" class="form-control" placeholder=""--}}
                                   {{--name="wage" id="wage" value="{{ $item->wage }}">--}}
                            <p class="form-control-static">{{ $item->wage }}</p>
                        </div>
                        @if ($errors->has('wage'))
                            <span class="text-danger">
                                    {{ $errors->first('wage') }}
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3">얼라이언스 Com</label>
                        <div class="col-md-6">
                            {{--<input type="text" class="form-control" placeholder=""--}}
                                   {{--name="alliance_ratio" id="alliance_ratio" value="{{ $item->alliance_ratio }}">--}}
                            <p class="form-control-static">{{ $item->alliance_ratio }}</p>
                        </div>
                        @if ($errors->has('alliance_ratio'))
                            <span class="text-danger">
                                    {{ $errors->first('alliance_ratio') }}
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3">기술사 Com</label>
                        <div class="col-md-6">
                            {{--<input type="text" class="form-control" placeholder=""--}}
                                   {{--name="certi_ratio" id="certi_ratio" value="{{ $item->certi_ratio }}">--}}
                            <p class="form-control-static">{{ $item->certi_ratio }}</p>
                        </div>
                        @if ($errors->has('certi_ratio'))
                            <span class="text-danger">
                                    {{ $errors->first('certi_ratio') }}
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3">수익</label>
                        <div class="col-md-6">
                            {{--<input type="text" class="form-control" placeholder=""--}}
                                   {{--name="self_ratio" id="self_ratio" value="{{ $item->self_ratio }}">--}}
                            <p class="form-control-static">{{ $item->self_ratio }}</p>
                        </div>
                        @if ($errors->has('self_ratio'))
                            <span class="text-danger">
                                    {{ $errors->first('self_ratio') }}
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="input" class="control-label col-md-3">수정일</label>
                        <div class="col-md-4">
                            <p class='form-control-static'>{{ $item->updated_at ? $item->updated_at->format('Y-m-d') : '-' }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input" class="control-label col-md-3">생성일</label>
                        <div class="col-md-4">
                            <p class='form-control-static'>{{ $item->created_at->format('Y-m-d') }}</p>
                        </div>
                    </div>
                </fieldset>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <a href="{{ url('/item') }}" class="btn btn-default"><i
                                    class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>

                        {{--<button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"--}}
                                {{--type="submit">저장--}}
                        {{--</button>--}}

                    </div>
                </div>
                {!! Form::close() !!}


            </div>

        </div>

    </div><!-- container -->

    {{--{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $item->id], 'id'=>'frm-user-destroy']) !!}--}}
    {{--{!! Form::close() !!}--}}


@endsection

@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection
