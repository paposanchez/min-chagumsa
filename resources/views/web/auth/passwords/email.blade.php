@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
{{--<div class="container">--}}

    {{--<div class="row">--}}

        {{--<div class="col-sm-4 col-sm-offset-4">--}}

            {{--<div class="tile tile-transparent shadow" style="margin-top:25%;">--}}

                {{--<div class="tile-row">--}}
                    {{--<div class="tile-col text-center">--}}
                        {{--<h3 class="text-muted">{{ trans("passwords.title") }}</h3>--}}
                        {{--<p class="text-muted">{{ trans("passwords.desc") }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--{!! Form::open(['url' => 'password/email', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}--}}

            {{--<div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">--}}
                {{--<label for="inputEmail" class="control-label sr-only">{{ trans("passwords.email") }}</label>--}}
                {{--<div class="col-lg-12">--}}
                    {{--<input type="email" class="form-control" placeholder="{{ trans("passwords.email") }}" name="email" id="inputEmail">--}}

                    {{--@if ($errors->has('email'))--}}
                    {{--<span class="help-block">--}}
                        {{--{{ $errors->first('email') }}--}}
                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<button class="btn btn-block btn-primary" data-loading-text="처리중..." type="submit">{{ trans("passwords.reset") }}</button>--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--{!! Form::close() !!}--}}


            {{--<p class="text-center"><small class="text-muted text-light">Copyrights by <a target="_blank" href="/about">mixapply.com</a> © 2015. All right reserved.</small></p>--}}

        {{--</div>--}}

    {{--</div>--}}

{{--</div>--}}
{{--</div>--}}

<div id='sub_full_wrap'>
    <div class='login_box_wrap'>

        <h3>비밀번호 찾기</h3>
        <h4>회원가입시 사용한 아이디(이메일)를 입력하세요.</h4>

        <div class='br20'></div>

        <div class='ipt_line'>
            <input type='text' class='ipt' id="email" placeholder='아이디 (이메일)'>
        </div>

        <div class='br20'></div>

        <div class='ipt_line'>
            <button class='btns btns_green' type="button" id="send">확인</button>
        </div>

    </div>
</div>

@endsection


@push( 'footer-script' )
<script type="text/javascript">
    $(function () {
        $('#send').click(function (){
            var email = $('#email').val();
            alert('새로운 비밀번호를 해당 이메일에 전송하였습니다.');

            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/resend',
                data : {
                    '_token': '{{ csrf_token() }}',

                }
            })

        });
    });
</script>
@endpush
