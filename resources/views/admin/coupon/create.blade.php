@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.user')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::open(['method' => 'POST','route' => ['coupon.store'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data", 'id' => 'coupon-form']) !!}
                <div class="form-group {{ $errors->has('publish_num') ? 'has-error' : '' }}">
                    <label for="inputEmail" class="control-label col-md-3">발행 부수</label>
                    <div class="col-md-6">
                        <input type="" class="form-control" placeholder="쿠폰방행 부수를 입력해 주세요." name="publish_num"
                               id="publish_num" required>

                        @if ($errors->has('publish_num'))
                            <span class="help-block">
                        {{ $errors->first('publish_num') }}
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('coupon_kind') ? 'has-error' : '' }}">
                    <label for="inputName" class="control-label col-md-3">쿠폰종류</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="쿠폰종류 입력" name="coupon_kind"
                               id="coupon_kind" value="promotion" required readonly>

                        @if ($errors->has('coupon_kind'))
                            <span class="help-block">
                        {{ $errors->first('coupon_kind') }}
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('publish_length') ? 'has-error' : '' }}">
                    <label for="inputPassword" class="control-label col-md-3">쿠폰번호 자리수</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="쿠폰코드 길이수를 입력해주세요.(기본 10, 최대 20)"
                               name="publish_length" id="publish_length" required="required">

                        @if ($errors->has('publish_length'))
                            <span class="help-block">
                        {{ $errors->first('publish_length') }}
                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <a href="{{ route('user.index') }}" class="btn btn-default"><i
                                    class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                        <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                type="submit">{{ trans('common.button.save') }}</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>



@endsection


@push( 'footer-script' )
    <script type="text/javascript">
        $(function () {
            $("#coupon-form").validate({
                messages: {
                    publish_num: "발행부수를 입력해 주세요.",
                    coupon_kind: "쿠폰종류를 입력해 주세요. (promotion)",
                    publish_length: "쿠폰번호 자리수를 입력해 주세요."
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
