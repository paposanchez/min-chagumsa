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
                            <input type="email" class="form-control" placeholder="{{ trans('admin/user.email') }}"
                                   name="email" id="inputEmail" value="{{ $user->email or old('email') }}">

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
                            <input type="name" class="form-control" placeholder="{{ trans('bcs/bcs-info.name') }}"
                                   name="name" id="inputName" value="{{ $user->name or old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : '' }}">
                        <label for="inputName"
                               class="control-label col-md-3">{{ trans('bcs/bcs-info.registration_number') }}</label>
                        <div class="col-md-4">
                            <p class='form-control-static'>{{ $user->user_extra->registration_number ? $user->user_extra->registration_number : '미등록, 짐브로스에 문의하세요.' }}</p>
                            <input type="hidden" name="registration_number"
                                   value="{{ $user->user_extra->registration_number }}">
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="inputPassword"
                               class="control-label col-md-3">{{ trans('bcs/bcs-info.new-password') }}</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control"
                                   placeholder="{{ trans('bcs/bcs-info.new-password') }}" name="password"
                                   id="inputPassword">

                            @if ($errors->has('password'))
                                <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="inputPasswordConfirmation"
                               class="control-label col-md-3">{{ trans('bcs/bcs-info.new-password_confirmation') }}</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control"
                                   placeholder="{{ trans('bcs/bcs-info.new-password_confirmation') }}"
                                   name="password_confirmation" id="inputPasswordConfirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <label for="inputMobile"
                               class="control-label col-md-3">{{ trans('bcs/bcs-info.mobile') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.mobile') }}"
                                   name="mobile" id="inputMobile" value="{{ $user->mobile or old('mobile') }}">

                            @if ($errors->has('mobile'))
                                <span class="help-block">
                            {{ $errors->first('mobile') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('select-aliance') ? 'has-error' : '' }}">
                        <label for="engineer_number"
                               class="control-label col-md-3">{{ trans('bcs/bcs-info.select-aliance') }}</label>
                        <div class="col-md-4">
                            {!! Form::select('aliance', $aliance_list, $user->user_extra->aliance_id, ['class'=>'form-control', 'multiple', 'id'=>'aliance']) !!}
                        </div>
                    </div>

                    {{-- 정비소 주소 관련 --}}
                    <div class="form-group {{ $errors->has('ceo_name') ? 'has-error' : '' }} ceo_name">
                        <label for="inputCeo" class="control-label col-md-3">정비소 대표자명</label>
                        <div class="col-md-4 ">
                            <input type="text" class="form-control" placeholder="정비소 대표자명" name="ceo_name" id="ceo_name"
                                   value="{{ $user->user_extra->ceo_name }}">
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                        <label for="tel" class="control-label col-md-3">정비소 전화번호</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="정비소 전화번호" name="tel" id="tel"
                                   value="{{ $user->user_extra->phone }}">

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
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.fax') }}"
                                   name="fax" id="fax" value="{{ $user->user_extra->fax }}">

                            @if ($errors->has('fax'))
                                <span class="help-block">
                            {{ $errors->first('fax') }}
                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                        <label for="address" class="control-label col-md-3">{{ trans('bcs/bcs-info.zipcode') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.zipcode') }}"
                                   name="zipcode" id="zipcode" value="{{ $user->user_extra->zipcode }}">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-zipcode') }}</span>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                        <label for="area" class="control-label col-md-3">{{ trans('bcs/bcs-info.area') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.area') }}"
                                   name="area" id="area" value="{{ $user->user_extra->area }}">
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
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.section') }}"
                                   name="section" id="section" value="{{ $user->user_extra->section }}">
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
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.address') }}"
                                   name="address" id="address" value="{{ $user->user_extra->address_extra }}">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-zipcode') }}</span>
                            @if ($errors->has('address'))
                                <span class="help-block">
                            {{ $errors->first('address') }}
                        </span>
                            @endif
                        </div>
                    </div>
                    {{-- 정비소 주소 관련 --}}


                    <div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }} bank">
                        <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.bank') }}</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.bank') }}"
                                   name="bank" id="bank" value="{{ $user->user_extra->bcs_bank }}">
                            <span class="help-block">{{ trans('admin/user.help-bank') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('account') ? 'has-error' : '' }} account">
                        <label for="inputGarage"
                               class="control-label col-md-3">{{ trans('admin/user.account') }}</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.account') }}"
                                   name="account" id="account" value="{{ $user->user_extra->bcs_account }}">
                            <span class="help-block">{{ trans('admin/user.help-account') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('owner') ? 'has-error' : '' }} bank">
                        <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.owner') }}</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.owner') }}"
                                   name="owner" id="owner" value="{{ $user->user_extra->bcs_account_name }}">
                            <span class="help-block">{{ trans('admin/user.help-bank') }}</span>
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('garage-avatar') ? 'has-error' : '' }}">
                        <label for="inputGarage"
                               class="control-label col-md-3">{{ trans('bcs/bcs-info.avatar') }}</label>
                        <div class="col-md-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    {{ Html::image('/avatar/'.$user->id, 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"
                                     style="max-width: 200px; max-height: 200px;"></div>
                                <div>
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">{{ trans('common.button.file-select') }}</span>
                                    <span class="fileinput-exists">{{ trans('common.button.change') }}</span>
                                    <input type="file" placeholder="{{ trans('bcs/bcs-info.avatar') }}" name="avatar"
                                           id="inputAvatar">
                                </span>
                                    <a href="#" class="btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">{{ trans('common.button.destroy') }}</a>
                                </div>
                            </div>

                            @if ($errors->has('avatar'))
                                <span class="help-block">
                            {{ $errors->first('avatar') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <!-- 파일 업로드 -->
                    <div class="form-group {{ $errors->has('attachment') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-3">정비소 관련자료</label>

                        <div class="col-md-9">

                            <div class="plugin-attach" id="plugin-attachment"></div>

                            @if ($errors->has('attachment'))
                                <span class="help-block">
                            {{ $errors->first('attachment') }}
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
                        <a href="{{ route('bcs.user.index') }}" class="btn btn-default"><i
                                    class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                        <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                type="submit">{{ trans('common.button.save') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>

        </div>

    </div><!-- container -->


@endsection


@push( 'footer-script' )
    <link rel="stylesheet"
          href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}"/>
    <script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
    <script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>
    <script type="text/template" id="qq-template">@include("partials/files", ['files'=> $user->files])</script>
    <script type="text/javascript">
        $(function () {
            $('#plugin-attachment').fineUploader({
                debug: true,
                //        template: 'qq-template',
                request: {
                    inputName: "upfile",
                    endpoint: '/file/upload',
                    customHeaders: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                deleteFile: {
                    enabled: true,
                    endpoint: '/file/delete',
                    customHeaders: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: "{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/placeholders/waiting-generic.png' ) }}",
                        notAvailablePath: "{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/placeholders/not_available-generic.png' ) }}",
                    }
                },
                validation: {
                    //            allowedExtensions: ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'hwp'],
                    itemLimit: 3,
                    sizeLimit: 5120000, // 50 kB = 50 * 1024 bytes
                    stopOnFirstInvalidFile: true
                },
                callbacks: {
                    onSubmit: function (id, fileName) {
                        this.setParams({'upfile_group': "bcs", 'upfile_group_id': "{{ $user->id }}"});
                    },
                    onComplete: function (id, fileName, responseJSON) {
                        if (responseJSON.success == true) {
                            $.notify(responseJSON.msg, "success");
                        } else {
                            $.notify(responseJSON.msg, "error");
                        }
                    }
                }
            });
        })
    </script>
@endpush
