@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.info')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::model($user, ['method' => 'PATCH','route' => ['bcs.info.update', $user->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
                <fieldset>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-md-3">{{ trans('admin/user.email') }}</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="{{ trans('admin/user.email') }}" name="email" id="inputEmail" value="{{ $user->email or old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-3">{{ trans('bcs/bcs-info.name') }}</label>
                        <div class="col-md-6">
                            <input type="name" class="form-control" placeholder="{{ trans('bcs/bcs-info.name') }}" name="name" id="inputName" value="{{ $user->name or old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-3">{{ trans('bcs/bcs-info.registration_number') }}</label>
                        <div class="col-md-4">
                            <p class='form-control-static'>{{ $user->user_extra->registration_number }}</p>
                            <input type="hidden" name="registration_number" value="{{ $user->user_extra->registration_number }}">
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="inputPassword" class="control-label col-md-3">{{ trans('bcs/bcs-info.new-password') }}</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" placeholder="{{ trans('bcs/bcs-info.new-password') }}" name="password" id="inputPassword">

                            @if ($errors->has('password'))
                                <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="inputPasswordConfirmation" class="control-label col-md-3">{{ trans('bcs/bcs-info.new-password_confirmation') }}</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" placeholder="{{ trans('bcs/bcs-info.new-password_confirmation') }}" name="password_confirmation" id="inputPasswordConfirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('select-aliance') ? 'has-error' : '' }}">
                        <label for="engineer_number" class="control-label col-md-3">{{ trans('bcs/bcs-info.select-aliance') }}</label>
                        <div class="col-md-4">
                            {{--<p class='form-control-static'>{{ $user->user_extra->aliance_id }}</p>--}}
                            {!! Form::select('aliance', $aliance_list, $user->user_extra->aliance_id, ['class'=>'form-control', 'multiple', 'id'=>'aliance']) !!}
                        </div>
                    </div>

                    {{-- 정비소 주소 관련 --}}
                    <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                        <label for="area" class="control-label col-md-3">{{ trans('bcs/bcs-info.area') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.area') }}" name="area" id="area" value="{{ $user->garageInfo->area }}">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-area') }}</span>
                            @if ($errors->has('area'))
                                <span class="help-block">
                            {{ $errors->first('area') }}
                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('section') ? 'has-error' : '' }}">
                        <label for="section" class="control-label col-md-3">{{ trans('bcs/bcs-info.section') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.section') }}" name="section" id="section" value="{{ $user->garageInfo->section }}">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-section') }}</span>
                            @if ($errors->has('section'))
                                <span class="help-block">
                            {{ $errors->first('section') }}
                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address" class="control-label col-md-3">{{ trans('bcs/bcs-info.address') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.address') }}" name="address" id="address" value="{{ $user->garageInfo->address }}">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-address') }}</span>
                            @if ($errors->has('address'))
                                <span class="help-block">
                            {{ $errors->first('address') }}
                        </span>
                            @endif
                        </div>
                    </div>
                    {{-- 정비소 주소 관련 --}}

                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <label for="inputMobile" class="control-label col-md-3">{{ trans('bcs/bcs-info.mobile') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.mobile') }}" name="mobile" id="inputMobile" value="{{ $user->mobile or old('mobile') }}">

                            @if ($errors->has('mobile'))
                                <span class="help-block">
                            {{ $errors->first('mobile') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                        <label for="tel" class="control-label col-md-3">{{ trans('bcs/bcs-info.tel') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.tel') }}" name="tel" id="tel" value="{{ $user->user_extra->phone }}">

                            @if ($errors->has('tel'))
                                <span class="help-block">
                            {{ $errors->first('tel') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
                        <label for="fax" class="control-label col-md-3">{{ trans('bcs/bcs-info.fax') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.fax') }}" name="fax" id="fax" value="{{ $user->user_extra->fax }}">

                            @if ($errors->has('fax'))
                                <span class="help-block">
                            {{ $errors->first('fax') }}
                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('garage-avatar') ? 'has-error' : '' }}">
                        <label for="inputAvatar" class="control-label col-md-3">{{ trans('bcs/bcs-info.garage-avatar') }}</label>
                        <div class="col-md-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    {{ Html::image('/avatar/'.$user->id, 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                <div>
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">{{ trans('common.button.file-select') }}</span>
                                    <span class="fileinput-exists">{{ trans('common.button.change') }}</span>
                                    <input type="file" placeholder="{{ trans('bcs/bcs-info.avatar') }}" name="avatar" id="inputAvatar">
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

                    <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                        <label for="inputAvatar" class="control-label col-md-3">{{ trans('bcs/bcs-info.avatar') }}</label>
                        <div class="col-md-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    {{ Html::image('/avatar/'.$user->id, 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                <div>
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">{{ trans('common.button.file-select') }}</span>
                                    <span class="fileinput-exists">{{ trans('common.button.change') }}</span>
                                    <input type="file" placeholder="{{ trans('bcs/bcs-info.avatar') }}" name="avatar" id="inputAvatar">
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
                        <label for="input" class="control-label col-md-3">{{ trans('bcs/bcs-info.created_at') }}</label>
                        <div class="col-md-4">
                            <p class='form-control-static'>{{ $user->created_at }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input" class="control-label col-md-3">{{ trans('bcs/bcs-info.updated_at') }}</label>
                        <div class="col-md-4">
                            <p class='form-control-static'>{{ $user->updated_at }}</p>
                        </div>
                    </div>
                </fieldset>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <a href="{{ route('bcs.user.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                        <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}" type="submit">{{ trans('common.button.save') }}</button>

                        {{--@if ($user->id != 1)--}}
                            {{--<button class="btn btn-danger pull-right" id="btn-user-destory" data-loading-text="{{ trans('common.button.loading') }}">{{ trans('common.button.destroy') }}</button>--}}
                        {{--@endif--}}

                    </div>
                </div>
                {!! Form::close() !!}

            </div>

        </div>

    </div><!-- container -->


@endsection


@push( 'footer-script' )
    <script type="text/javascript">

    </script>
@endpush
