@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>1:1 문의</div>

    <div id='sub_wrap'>

        <div class='br20'></div>

        {!! Form::open(['route' => ["inquire.store"], 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'form']) !!}
        <div class='join_wrap'>

            <div class='join_term_wrap'>
                <label>이메일</label>
            </div>
            <div class='ipt_line br10  {{ $errors->has('email') ? 'has-error' : '' }}'>
                <input type='text' class='ipt form-control' name="email" id="inputEmail" value="{{ $user->email }}" placeholder='아이디 (이메일)'>
                @if ($errors->has('email'))
                    <span class="help-block">
                                {{ $errors->first('email') }}
                        </span>
                @else
                    <span class="help-block">
                                * 답변내용은 이메일로 받아보실 수 있습니다
                        </span>
                @endif
            </div>
            <div class='br20'></div>

            <div class='join_term_wrap'>
                <label>제목</label>
            </div>
            <div class='ipt_line br10  {{ $errors->has('subject') ? 'has-error' : '' }}'>
                <input type='text' class='ipt form-control' placeholder="제목을 입력하세요" name="subject" id="inputSubject">
                @if ($errors->has('subject'))
                    <span class="help-block">
                                {{ $errors->first('subject') }}
                        </span>
                @endif
            </div>
            <div class='br20'></div>

            <div class='join_term_wrap'>
                <label>내용</label>
            </div>
            <div class='ipt_line br10 {{ $errors->has('content') ? 'has-error' : '' }}'>
                <textarea class='tarea form-control' name="content" placeholder='내용을 입력하세요'></textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                                {{ $errors->first('content') }}
                        </span>
                @endif
            </div>
            {{--<div class='ipt_line br10'>--}}
                {{--<div class='psk_fileUp'>--}}
                    {{--<input type='hidden' class='file_name ipt wid75' placeholder='파일선택을 선택하세요' readonly>--}}
                    {{--<label for='inquery_file'>파일첨부</label>--}}
                    {{--<input type='file' id='inquery_file' class='psk_uploader'>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class='br20'></div>

            <div class='ipt_line'>
                <button class='btns btns_green' style='display:inline-block;' type="submit">문의하기</button>
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
        var fileTarget = $('.psk_fileUp .psk_uploader');
        fileTarget.on('change', function(){
            if(window.FileReader){
                var filename = $(this)[0].files[0].name;
            } else {
                var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출
            }
            $(this).siblings('.file_name').val(filename);
        });

        //form validation
        $("#form").validate({
            debug: true,
            rules: {
                email : {
                    required: true,
                    email:true,
                },
                subject : {
                    required: true
                },
                content : {
                    required: true
                },
                password : {
                    required: true,
                    minlength: 4,
                    maxlength: 16
                }
            },
            messages: {
                email : "이메일을 입력해주세요.",
                subject : "문의하실 내용의 제목을 입력해주세요.",
                content : "문의하실 내용을 입력해주세요.",
                password : "비밀번호를 확인하세요.(4~16 자리의 영문/숫자/특수문자)"
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });
</script>

@endpush