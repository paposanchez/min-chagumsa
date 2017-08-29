@extends( 'web.layouts.default' )

@section('breadcrumbs')
{{--    {{ dd(Breadcrumbs::generate('web.community.inquire')) }}--}}
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.community.'.$board_namespace)])
@endsection

@section( 'content' )

<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>1:1 문의</span></div></h2></div>

<div id='sub_wrap'>

        <ul class="menu_tab_wrap">
                <li><a class='' href='{{ route('notice.index') }}'>공지사항</a></li>
                <li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
                <li><a class='select' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
        </ul>


        <br class="clearfix" />

        {!! Form::open(['route' => ["inquire.store"], 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'form']) !!}
        <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="inputEmail" class="control-label col-xs-3">{{ trans('web/register.email') }}</label>

                <div class=" col-xs-4">
                        <input type="email" class="form-control " placeholder="{{ trans('web/register.email') }}" name="email" id="inputEmail" value="{{ $user->email }}">


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
        </div>

        <div class="form-group  {{ $errors->has('subject') ? 'has-error' : '' }}">
                <label for="inputSubject" class="control-label col-xs-3">제목</label>

                <div class=" col-xs-9">
                        <input type="text" class="form-control " placeholder="제목을 입력하세요" name="subject" id="inputSubject">

                        @if ($errors->has('subject'))
                        <span class="help-block">
                                {{ $errors->first('subject') }}
                        </span>
                        @endif
                </div>
        </div>


        <div class="form-group  {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="inputName" class="control-label col-xs-3">내용</label>

                <div class=" col-xs-9">
                        <textarea class='form-control' name="content" rows="12" placeholder='내용을 입력하세요'></textarea>
                        @if ($errors->has('content'))
                        <span class="help-block">
                                {{ $errors->first('content') }}
                        </span>
                        @endif
                </div>
        </div>


        <!-- <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="inputPassword" class="control-label col-xs-3">{{ trans('web/register.password') }}</label>

                <div class=" col-xs-9">
                        <input type="password" class="form-control " placeholder="비밀번호" name="password" id="inputPassword" style="width:150px;">

                        @if ($errors->has('password'))
                        <span class="help-block">
                                {{ $errors->first('password') }}
                        </span>
                        @endif
                </div>
        </div> -->



        <p class="text-center">
                <a href="/community/inquire" class="btn btn-lg btn-default" data-loading-text="처리중...">취소</a>
                <button class="btn btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">문의하기</button>

        </p>

        {!! Form::close() !!}
</div>

@endsection

@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function() {
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
