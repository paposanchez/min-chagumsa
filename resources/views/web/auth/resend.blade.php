@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
<div class="container">

    <div class="row">

        <div class="col-sm-4 col-sm-offset-4">

            <div class="tile tile-transparent shadow" style="margin-top:25%;">

                <div class="tile-row">
                    <div class="tile-col text-center">
                        <h3 class="text-muted">회원가입 이메일 재발송</h3>
                        <p class="text-muted"></p>
                    </div>
                </div>
            </div>

            {!! Form::open(['url' => 'password/email', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}   

            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="inputEmail" class="control-label sr-only">{{ trans("passwords.email") }}</label>
                <div class="col-lg-12">
                    <input type="email" class="form-control" placeholder="{{ trans("passwords.email") }}" name="email" id="inputEmail">

                    @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <button class="btn btn-block btn-primary" data-loading-text="처리중..." type="submit">재발송</button>
                </div>
            </div>


            {!! Form::close() !!}


            <p class="text-center"><small class="text-muted text-light">Copyrights by <a target="_blank" href="/about">mixapply.com</a> © 2015. All right reserved.</small></p>

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
