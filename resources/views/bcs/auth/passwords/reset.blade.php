@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
<div class="container">

    <div class="row">

        <div class="col-sm-4 col-sm-offset-4">


            <div class="tile tile-transparent shadow" style="margin-top:25%;">

                <div class="tile-row">
                    <div class="tile-col text-center">
                        <h3 class="text-muted">{{ trans("passwords.title") }}</h3>
                        <p class="text-muted">{{ trans("passwords.desc") }}</p>
                    </div>
                </div>

                {!! Form::open(['url' => 'password/reset', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}   

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">{{ trans("passwords.email") }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">비밀번호</label>

                    <div class="">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="control-label">비밀번호확인</label>
                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">

                    <button class="btn btn-block btn-primary" data-loading-text="처리중..." type="submit">패스워드 변경</button>

                </div>

                {!! Form::close() !!}


                <p class="text-center">
                    <small class="text-muted text-light">Copyrights by <a target="_blank" href="/about">mixapply.com</a> © 2015. All right reserved.</small>
                </p>

            </div>

        </div>	

    </div>
</div>

@endsection


@section( 'footer-script' )
<script type="text/javascript">
    $(function () {

    });
</script>
@endsection
