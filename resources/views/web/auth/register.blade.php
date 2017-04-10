@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')

<div class="container">

    <div class="row">

        <div class="col-sm-4 col-sm-offset-4">

            <div class="tile tile-transparent shadow" style="margin-top:25%;">

                <div class="tile-row">
                    <div class="tile-col text-center">
                        <h3 class="text-muted">{{ trans("web/register.title") }}</h3>
                        <p class="text-muted">{{ trans("web/register.desc") }}</p>
                    </div>
                </div>

                <div class="tile-row">
                    <div class="tile-col">


                        <form class="form-horizontal" role="form" method="POST"  action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="inputEmail" class="control-label sr-only">{{ trans('web/register.email') }}</label>
                                <div class="col-lg-12">
                                    <input type="email" class="form-control" placeholder="{{ trans('web/register.email') }}" name="email" id="inputEmail">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="inputName" class="control-label sr-only">{{ trans('web/register.name') }}</label>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" placeholder="{{ trans('web/register.name') }}" name="name" id="inputName">

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="inputPassword" class="control-label sr-only">{{ trans('web/register.password') }}</label>
                                <div class="col-lg-12">
                                    <input type="password" class="form-control" placeholder="{{ trans('web/register.password') }}" name="password" id="inputPassword">

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <label for="inputPasswordConfirmation" class="control-label sr-only">{{ trans('web/register.confirm-password') }}</label>
                                <div class="col-lg-12">
                                    <input type="password" class="form-control" placeholder="{{ trans('web/register.confirm-password') }}" name="password_confirmation" id="inputPasswordConfirmation">

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button class="btn btn-block btn-primary" data-loading-text="처리중..." type="submit">회원가입</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <p class="text-center"><small class="text-muted text-light">Copyrights by <a target="_blank" href="/about">mixapply.com</a> © 2015. All right reserved.</small></p>

        </div>

    </div>

</div>



@endsection

@section( 'footer-script' )
<script type="text/javascript">
    $(function () {
//        $.validate({
//                form: '.ma-form-validation',
//                modules: 'html5',
//                errorElementClass: 'form-danger',
//                errorMessageClass: 'text-danger'
//        });
    });
</script>
@endsection
