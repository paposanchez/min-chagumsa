@extends( 'admin.layouts.default' )

@section( 'content' )


    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>쿠폰 생성
                        <!-- <small>새로운 주문을 생성한다..</small> -->
                    </h2>

                    <ul class="actions">
                        <li>
                            <a href="/posting" class="goback">
                                <i class="zmdi zmdi-view-list"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding">
                    {!! Form::open(['method' => 'POST','route' => ['coupon.store'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data", 'id' => 'coupon-form']) !!}
                    <div class="form-group {{ $errors->has('coupon_kind') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-3">쿠폰종류</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="쿠폰종류를 입력해주세요." name="coupon_kind"
                                   id="coupon_kind" value="" required>

                            @if ($errors->has('coupon_kind'))
                                <span class="help-block">
                        {{ $errors->first('coupon_kind') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                        <label for="inputPassword" class="control-label col-md-3">쿠폰번호 할인금액</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="쿠폰 할인금액을 입력해주세요."
                                   name="amount" id="amount" required="required" >

                            @if ($errors->has('amount'))
                                <span class="help-block">
                        {{ $errors->first('amount') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('publish_length') ? 'has-error' : '' }}">
                        <label for="inputPassword" class="control-label col-md-3">쿠폰번호 자리수</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="쿠폰코드 길이수를 입력해주세요.(기본 10, 최대 20)"
                                   name="publish_length" id="publish_length" value="10" required="required" >
                            <small>쿠폰코드 길이수를 입력해주세요.(기본 10, 최대 20)</small>

                            @if ($errors->has('publish_length'))
                                <span class="help-block">
                        {{ $errors->first('publish_length') }}
                    </span>
                            @endif
                        </div>
                    </div>



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
    </section>



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
