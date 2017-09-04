@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.user')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::open(['method' => 'POST','route' => ['bcs.user.store'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data"]) !!}
                    <input type="hidden" name="roles" value="4"> {{-- todo 엔지니어 상태값 고정 --}}

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-md-3">{{ trans('bcs/user.email') }}</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="{{ trans('bcs/user.email') }}" name="email" id="inputEmail" value="">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-3">{{ trans('bcs/user.name') }}</label>
                        <div class="col-md-6">
                            <input type="name" class="form-control" placeholder="{{ trans('bcs/user.name') }}" name="name" id="inputName" value="">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="inputPassword" class="control-label col-md-3">{{ trans('bcs/user.password') }}</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" placeholder="{{ trans('bcs/user.password') }}" name="password" id="inputPassword">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="inputPasswordConfirmation" class="control-label col-md-3">{{ trans('bcs/user.password_confirmation') }}</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" placeholder="{{ trans('bcs/user.password_confirmation') }}" name="password_confirmation" id="inputPasswordConfirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    {{--<div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">--}}
                        {{--<label for="bcs_number" class="control-label col-md-3">{{ trans('bcs/user.bcs_number') }}</label>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<p class='form-control-static'>123</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}



                    {{--<div class="form-group ">--}}
                        {{--<label for="inputUserStatus" class="control-label col-md-3">상태</label>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="btn-group" data-toggle="buttons">--}}
                                {{--<label class="btn btn-default">--}}
                                    {{--<input name="status_cd" autocomplete="off" value="1" type="radio"> 활성--}}
                                {{--</label>--}}
                                {{--<label class="btn btn-default">--}}
                                    {{--<input name="status_cd" autocomplete="off" value="2" type="radio"> 비활성--}}
                                {{--</label>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}


                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <label for="inputMobile" class="control-label col-md-3">{{ trans('bcs/user.mobile') }}</label>
                        <div class="col-md-4">
                            <input type="tel" class="form-control" placeholder="{{ trans('bcs/user.mobile') }}" name="mobile" id="inputMobile" value="{{ $user->mobile or old('mobile') }}">

                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                {{ $errors->first('mobile') }}
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                        <label for="inputAvatar" class="control-label col-md-3">{{ trans('admin/user.avatar') }}</label>
                        <div class="col-md-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    {{ Html::image('/avatar', 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}
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

                            @if ($errors->has('avatar'))
                                <span class="help-block">
                            {{ $errors->first('avatar') }}
                        </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <a href="{{ route('bcs.user.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                            <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}" type="submit">{{ trans('common.button.save') }}</button>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection

@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection