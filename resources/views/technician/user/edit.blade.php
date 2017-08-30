@extends( 'technician.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.user.edit')])
@endsection

@section( 'content' )
{{--
todo 패스워드 변경은 별도 모달로 한다.
일단, 기능상에서는 처리하지 말자
--}}
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::open(['method' => 'POST','url' => ['user/update'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data", "id" => "user-form"]) !!}
                <input type="hidden" name="roles" value="">{{-- todo 엔지니어 상태값 고정--}}

                <div class="form-group">
                    <label for="inputEmail" class="control-label col-md-3">이메일</label>
                    <div class="col-md-6">
                        <input class="form-control" placeholder="이메일" name="email" id="inputEmail" value="{{ $user->email }}" type="email" readonly>

                    </div>
                </div>

                <div class="form-group ">
                    <label for="inputName" class="control-label col-md-3">이름</label>
                    <div class="col-md-6">
                        <input class="form-control" placeholder="이름" name="name" id="inputName" value="{{ $user->name }}" type="name" required>

                    </div>
                </div>

                <div class="form-group ">
                    <label for="inputPassword" class="control-label col-md-3">비밀번호</label>
                    <div class="col-md-4">
                        <input class="form-control" placeholder="비밀번호" name="password" id="inputPassword" type="password">

                    </div>
                </div>

                <div class="form-group ">
                    <label for="inputPasswordConfirmation" class="control-label col-md-3">비밀번호 확인</label>
                    <div class="col-md-4">
                        <input class="form-control" placeholder="비밀번호 확인" name="password_confirmation" id="inputPasswordConfirmation" type="password">

                    </div>
                </div>

                <div class="form-group ">
                    <label for="inputMobile" class="control-label col-md-3">휴대전화번호</label>
                    <div class="col-md-4">
                        <input class="form-control" placeholder="휴대전화번호" name="mobile" id="inputMobile" value="{{ $user->mobile }}" type="text" required>

                    </div>
                </div>

                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                    <label for="inputAvatar" class="control-label col-md-3">{{ trans('admin/user.avatar') }}</label>
                    <div class="col-md-6">
                        <div class="fileinput fileinput-new" data-provides="fileinput">

                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                {{ Helper::imageTag('/avatar/'.$user->id, 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                            <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">{{ trans('common.button.file-select') }}</span>
                                <span class="fileinput-exists">{{ trans('common.button.change') }}</span>
                                <input type="file" placeholder="{{ trans('admin/user.avatar') }}" name="avatar" id="inputAvatar">
                            </span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ trans('common.button.destroy') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button class="btn btn-primary" type="submit">수정하기</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection

@section( 'footer-script' )
    <script type="text/javascript">
    $(function () {
        $("#user-form").validate({
            messages: {
                name: "성명을 입력해 주세요.",
//                password: "비밀번호를 입력해 주세요.",
//                password_confirmation: "비밀번호 확인을 입력해 주세요.",
                mobile: "휴대전화를 입력해 주세요.",
            },

            submitHandler: function(form){
                form.submit();
            }

        });
    })
    </script>
@endsection