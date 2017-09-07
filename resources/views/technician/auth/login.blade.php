@extends( 'admin.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
<div class="container">

        <div class="row">

                <div class="col-sm-4 col-sm-offset-4">

                        <div class="tile tile-transparent shadow" style="margin-top:25%;">

                                <div class="tile-row">
                                        <div class="tile-col text-center">
                                                <h3 class="text-muted">차검사 기술사 System</h3>
                                                {{--<p class="text-muted">Login in. To see it in action.</p>--}}
                                        </div>
                                </div>

                                <div class="tile-row">
                                        <div class="tile-col">

                                                {!! Form::open(['url' => 'login', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id'=>'login-form']) !!}

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
                                                <div class="form-group">
                                                        <div class="col-lg-12">
                                                                <button class="btn btn-block btn-primary" data-loading-text="처리중..." type="submit">로그인</button>
                                                        </div>
                                                </div>

                                                {!! Form::close() !!}

                                        </div>

                                </div>

                        </div>

                        <p class="text-center"><small class="text-muted text-light">Copyrights by <a target="_blank" href="http://www.chargumsa.com">www.chargumsa.com</a> © 2017. All right reserved.</small></p>

                </div>

        </div>

</div>

@endsection



@push( 'footer-script' )
<script type="text/javascript">
$(function(){

        //form validation
        $("#login-form").validate({
                rules: {
                        email: {
                                required: true,
                                email: true
                        },
                        password: {
                                required: true
                        }
                },
                messages: {
                        email: "정확한 이메일 주소를 입력해 주세요.",
                        password: "비밀번호를 확인하세요."
                },
                submitHandler: function(form){

                        form.submit();
                }
        });
});

</script>
@endpush
