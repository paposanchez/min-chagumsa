@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>비밀번호 찾기</div>

    <div id='sub_wrap'>

        <div class='br20'></div>
        {!! Form::open(['url' => 'password/email', 'class' =>'form-horizontal', 'id' => 'verify-form', 'method' => 'post', 'role' => 'form']) !!}

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
                <button class="btn btn-block btn-primary" data-loading-text="처리중..." type="submit">{{ trans("passwords.reset") }}</button>
            </div>
        </div>


        {!! Form::close() !!}
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
                    email: '이메일 주소가 잘못 입력 되었습니.',
                }
            },

            submitHandler: function(form){
                form.submit();
            }
        });
    });

</script>

@endpush