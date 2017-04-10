@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.mypage.profile')])
@endsection

@section( 'content' )
<div class="container">

    <div class="row">

        <div class="col-md-3 hidden-sm hidden-xs">
            @include( 'web.partials.submenu.mypage' )
        </div>

        <div class="col-md-9">


                {!! Form::model($profile, ['method' => 'PATCH','route' => ['profile.update', $profile->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
                <fieldset>

                    <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-md-3">이메일</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $profile->email }}</p>
                        </div>
                    </div>


                    <div class="form-group  {{ $errors->has('profile') ? 'has-error' : '' }}">
                        <label for="inputProfile" class="control-label col-md-3">프로필</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" placeholder="프로필" name="profile" id="inputProfile">

                            @if ($errors->has('profile'))
                            <span class="help-block">
                                {{ $errors->first('profile') }}
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="inputPassword" class="control-label col-md-3">비밀번호</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="비밀번호" name="password" id="inputPassword">

                            @if ($errors->has('password'))
                            <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="inputPasswordConfirmation" class="control-label col-md-3">비밀번호 확인</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="비밀번호 확인" name="password_confirmation" id="inputPasswordConfirmation">

                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button class="btn btn-default"><i class="fa fa-reply"></i> 돌아가기</button>
                            <button class="btn btn-primary" data-loading-text="처리중..." type="submit">저장</button>
                        </div>
                    </div>


                    {!! Form::close() !!}
                    </div>

                    </div>

                    </div>

                    @endsection
