@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">

            <div class="card">

                <div class="card-header">
                    <h2>상품 생성
                        <small>이곳은 상품의 생성이 가능합니다.</small>
                    </h2>
                </div>

                <div class="card-body card-padding">

                    {!! Form::open(['method' => 'POST','route' => ['item.store'], 'class'=>'form-horizontal', 'id'=>'itemForm', 'enctype'=>"multipart/form-data"]) !!}
                    <fieldset>

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">상품명</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="상품명"
                                           autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                                                {{ $errors->first('name') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('self_ratio') ? 'has-error' : '' }}">
                            <label for="" class="col-sm-2 control-label">차량 분류</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <div class="select">
                                        {!! Form::select('car_sort_cd', $car_sort_list, [],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                @if ($errors->has('car_sort_cd'))
                                    <span class="text-danger">
                                                                {{ $errors->first('car_sort_cd') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('self_ratio') ? 'has-error' : '' }}">
                            <label for="" class="col-sm-2 control-label">상품 분류</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <div class="select">
                                        {!! Form::select('type_cd', $type_list, [],['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                @if ($errors->has('type_cd'))
                                    <span class="text-danger">
                                                                {{ $errors->first('type_cd') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">가격</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="number" name="price" value="{{ old('price') }}" placeholder="가격"
                                           autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('price'))
                                    <span class="text-danger">
                                                                {{ $errors->first('price') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('commission') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">PG 수수료</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="number" step="0.01" name="commission" value="{{ old('commission') }}"
                                           placeholder="PG 수수료" autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('commission'))
                                    <span class="text-danger">
                                                                {{ $errors->first('commission') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">카히스토리 고정비용</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="number" name="cost" value="{{ old('cost') }}" placeholder="키히스토리 고정비용"
                                           autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('cost'))
                                    <span class="text-danger">
                                                                {{ $errors->first('cost') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('wage') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">정비소 공임비용</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="number" name="wage" value="{{ old('wage') }}" placeholder="정비소 공임비용"
                                           autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('wage'))
                                    <span class="text-danger">
                                                                {{ $errors->first('wage') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('guarantee') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">BNP 보증료</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="number" name="guarantee" value="{{ old('guarantee') }}"
                                           placeholder="BNP 보증료" autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('guarantee'))
                                    <span class="text-danger">
                                                                {{ $errors->first('guarantee') }}
                                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('alliance_ratio') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">얼라이언스 Com</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="number" step="0.001" name="alliance_ratio"
                                           value="{{ old('alliance_ratio') }}"
                                           placeholder="얼라이언스 Com" autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('alliance_ratio'))
                                    <span class="text-danger">
                                                                {{ $errors->first('alliance_ratio') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('certi_ratio') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">기술사 Com</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="number" step="0.001" name="certi_ratio"
                                           value="{{ old('certi_ratio') }}"
                                           placeholder="기술사 Com" autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('certi_ratio'))
                                    <span class="text-danger">
                                                                {{ $errors->first('certi_ratio') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('self_ratio') ? 'has-error' : '' }}">
                            <label for="inputEmail3" class="col-sm-2 control-label">수익</label>
                            <div class="col-sm-10">
                                <div class="fg-line">
                                    <input type="number" step="0.001" name="self_ratio" value="{{ old('self_ratio') }}"
                                           placeholder="수익"
                                           autocomplete="off" class="form-control">
                                </div>

                                @if ($errors->has('self_ratio'))
                                    <span class="text-danger">
                                                                {{ $errors->first('self_ratio') }}
                                                        </span>
                                @endif
                            </div>
                        </div>

                    </fieldset>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                    type="submit">{{ trans('common.button.save') }}</button>
                            <a href="{{ route('item.index') }}" class="btn btn-default"><i
                                        class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>

            </div>

        </div>
    </section>
@endsection

@push( 'footer-script' )
    <script type="text/javascript">

    </script>
@endpush
