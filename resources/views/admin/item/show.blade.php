@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.calculation')])
@endsection

@section( 'content' )
<section id="content">
        <div class="container">

                <div class="card">

                        <div class="card-header">
                                <h2>상품수정
                                        <small>이곳은 상품의 수정이 가능합니다.</small>
                                </h2>
                        </div>

                        <div class="card-body card-padding">

                                {!! Form::open(['method' => 'POST','url' => ['item/update'], 'class'=>'form-horizontal', 'id'=>'carForm', 'enctype'=>"multipart/form-data"]) !!}
                                <input type="hidden" name="item_id" value="{{ $item->id }}">

                                <fieldset>

                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label for="inputEmail3" class="col-sm-2 control-label">상품명</label>
                                                <div class="col-sm-10">
                                                        <div class="fg-line">
                                                                <input type="text" name="name" value="{{ $item->name }}" placeholder="이메일" autocomplete="off" class="form-control" >
                                                        </div>

                                                        @if ($errors->has('name'))
                                                        <span class="text-danger">
                                                                {{ $errors->first('name') }}
                                                        </span>
                                                        @endif
                                                </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                                <label for="inputEmail3" class="col-sm-2 control-label">가격</label>
                                                <div class="col-sm-10">
                                                        <div class="fg-line">
                                                                <input type="number" name="price" value="{{ $item->price }}" placeholder="가격" autocomplete="off" class="form-control" >
                                                        </div>

                                                        @if ($errors->has('price'))
                                                        <span class="text-danger">
                                                                {{ $errors->first('price') }}
                                                        </span>
                                                        @endif
                                                </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('commission') ? 'has-error' : '' }}">
                                                <label for="inputEmail3" class="col-sm-2 control-label">PG수수료</label>
                                                <div class="col-sm-10">
                                                        <div class="fg-line">
                                                                <input type="number" name="commission" value="{{ $item->commission }}" placeholder="PG수수료" autocomplete="off" class="form-control" >
                                                        </div>

                                                        @if ($errors->has('commission'))
                                                        <span class="text-danger">
                                                                {{ $errors->first('commission') }}
                                                        </span>
                                                        @endif
                                                </div>
                                        </div>


                                        <div class="form-group {{ $errors->has('guarantee') ? 'has-error' : '' }}">
                                                <label for="inputEmail3" class="col-sm-2 control-label">보증료</label>
                                                <div class="col-sm-10">
                                                        <div class="fg-line">
                                                                <input type="number" name="guarantee" value="{{ $item->guarantee }}" placeholder="보증료" autocomplete="off" class="form-control" >
                                                        </div>

                                                        @if ($errors->has('guarantee'))
                                                        <span class="text-danger">
                                                                {{ $errors->first('guarantee') }}
                                                        </span>
                                                        @endif
                                                </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('wage') ? 'has-error' : '' }}">
                                                <label for="inputEmail3" class="col-sm-2 control-label">공임</label>
                                                <div class="col-sm-10">
                                                        <div class="fg-line">
                                                                <input type="number" name="price" value="{{ $item->wage }}" placeholder="가격" autocomplete="off" class="form-control" >
                                                        </div>

                                                        @if ($errors->has('wage'))
                                                        <span class="text-danger">
                                                                {{ $errors->first('wage') }}
                                                        </span>
                                                        @endif
                                                </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('alliance_ratio') ? 'has-error' : '' }}">
                                                <label for="inputEmail3" class="col-sm-2 control-label">얼라이언스 Com</label>
                                                <div class="col-sm-10">
                                                        <div class="fg-line">
                                                                <input type="number" name="alliance_ratio" value="{{ $item->alliance_ratio }}" placeholder="가격" autocomplete="off" class="form-control" >
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
                                                                <input type="number" name="certi_ratio" value="{{ $item->certi_ratio }}" placeholder="가격" autocomplete="off" class="form-control" >
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
                                                                <input type="number" name="price" value="{{ $item->self_ratio }}" placeholder="가격" autocomplete="off" class="form-control" >
                                                        </div>

                                                        @if ($errors->has('self_ratio'))
                                                        <span class="text-danger">
                                                                {{ $errors->first('self_ratio') }}
                                                        </span>
                                                        @endif
                                                </div>
                                        </div>


                                        <div class="form-group">
                                                <label for="" class="col-sm-2 control-label">생성일</label>
                                                <div class="col-sm-10">
                                                        <p class='form-control-static'>{{ $item->created_at }}</p>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="" class="col-sm-2 control-label">수정일</label>
                                                <div class="col-sm-10">
                                                        <p class='form-control-static'>{{ $item->updated_at ? $item->updated_at : '-' }}</p>
                                                </div>
                                        </div>

                                </fieldset>


                                <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                                <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}" type="submit">{{ trans('common.button.save') }}</button>
                                                <a href="{{ route('item.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
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
