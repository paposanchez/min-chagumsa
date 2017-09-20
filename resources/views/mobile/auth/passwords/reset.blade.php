@extends( 'mobile.layouts.default' )

@section( 'content' )


    <div id='sub_wrap'>

        <div class='br20'></div>

            <div class="text-center" style="margin:30px 0px 110px;">

                <h3>비밀번호 찾기</h3>
                <h4 class="text-muted">회원가입시 사용한 아이디(이메일)를 입력하세요.</h4>

            </div>

            <div class="login_box_wrap">
                {!! Form::open(['url' => 'password/email', 'class' =>'form-horizontal', 'id' => 'verify-form', 'method' => 'post', 'role' => 'form']) !!}

                <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="inputEmail" class="control-label sr-only">{{ trans('web/register.email') }}</label>
                    <input type="email" class="form-control  input-lg" placeholder="{{ trans('web/register.email') }}" name="email" id="inputEmail">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>



                <p class="text-center">
                    <button class="btn btn-block btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">확인</button>
                </p>

                {!! Form::close() !!}

            </div>


    </div>


@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function(){
        $("#verify-form").validate({
            debug: true,
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "정확한 메일 주소를 입력해 주세요.",
                    email: '이메일 주소가 잘못 입력 되었습니다.',
                }
            },

            submitHandler: function(form){
                form.submit();
            }
        });
    });

</script>

@endpush
