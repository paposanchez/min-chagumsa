@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.user')])
@endsection

@section( 'content' )
<div class="container-fluid">

        <div class="row">

                <div class="col-md-12">

                        {!! Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
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
                                        <label for="inputName" class="control-label col-md-3">{{ trans('admin/user.name') }}</label>
                                        <div class="col-md-6">
                                                <input type="name" class="form-control" placeholder="{{ trans('admin/user.name') }}" name="name" id="inputName" value="{{ $user->name or old('name') }}">

                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                        {{ $errors->first('name') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>

                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="inputPassword" class="control-label col-md-3">{{ trans('admin/user.new-password') }}</label>
                                        <div class="col-md-4">
                                                <input type="password" class="form-control" placeholder="{{ trans('admin/user.new-password') }}" name="password" id="inputPassword">

                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                        {{ $errors->first('password') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>

                                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                        <label for="inputPasswordConfirmation" class="control-label col-md-3">{{ trans('admin/user.new-password_confirmation') }}</label>
                                        <div class="col-md-4">
                                                <input type="password" class="form-control" placeholder="{{ trans('admin/user.new-password_confirmation') }}" name="password_confirmation" id="inputPasswordConfirmation">

                                                @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                        {{ $errors->first('password_confirmation') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>

                                <div class="form-group {{ $errors->has('roles') ? 'has-error' : 'roles' }}">
                                        <label for="inputRoles" class="control-label col-md-3">{{ trans('admin/user.roles') }}</label>
                                        <div class="col-md-6 role_selector">

                                                {{--@if ($user->id == 1)--}}
                                                {{--{!! Form::select('roles[]', $roles, $userRole, ['class'=>'form-control', 'multiple', 'disabled'=>'disabled',  'id'=>'user-role']) !!}--}}
                                                {{--@else--}}
                                                {!! Form::select('roles[]', $roles, $userRole, ['class'=>'form-control', 'multiple', 'id'=>'user-role']) !!}
                                                {{--@endif--}}


                                                @if ($errors->has('roles'))
                                                <span class="help-block">
                                                        {{ $errors->first('roles') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>

                                <div class="form-group {{ $errors->has('garage') ? 'has-error' : 'garage' }} " style="display: none;">
                                        <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.garage') }}</label>
                                        <div class="col-md-6 selected_garage">
                                                @if($user->user_extra)
                                                <input type="text" class="form-control" name="garage" id="selected_garage" value="{{ $user->user_extra->garage->name }}" readonly>
                                                @endif

                                                @if ($errors->has('garage'))
                                                <span class="help-block">
                                                        {{ $errors->first('garage') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>

                                <div id="garage_info" style="display: none">
                                        <div class="form-group {{ $errors->has('aliance') ? 'has-error' : '' }} aliance">
                                                <label for="inputGarage" class="control-label col-md-3">BCS 네트워크</label>
                                                <div class="col-md-6 ">
                                                        {!! Form::select('aliance_id', $aliances, $user->user_extra ? $user->user_extra->aliance_id : '', ['class'=>'form-control', 'multiple', 'id'=>'aliance']) !!}
                                                </div>

                                                @if ($errors->has('garage'))
                                                <span class="help-block">
                                                        {{ $errors->first('garage') }}
                                                </span>
                                                @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('garage_name') ? 'has-error' : '' }} garage_name">
                                                <label for="inputGarage" class="control-label col-md-3">정비소 대표자명</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_name') }}" name="garage_name" id="garage_name" value="{{ $user->user_extra ? $user->user_extra->ceo_name : '' }}">
                                                </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('garage_tel') ? 'has-error' : '' }} garage_tel">
                                                <label for="inputGarage" class="control-label col-md-3">정비소 전화번호</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_tel') }}" name="garage_tel" id="garage_tel" value="{{ $user->user_extra ? $user->user_extra->phone : '' }}">
                                                </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
                                                <label for="fax" class="control-label col-md-3">{{ trans('bcs/bcs-info.fax') }}</label>
                                                <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.fax') }}" name="fax" id="fax" value="{{ $user->user_extra ? $user->user_extra->fax : '' }}">

                                                        @if ($errors->has('fax'))
                                                        <span class="help-block">
                                                                {{ $errors->first('fax') }}
                                                        </span>
                                                        @endif
                                                </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('garage_zipcode') ? 'has-error' : '' }} garage_zipcode">
                                                <label for="inputGarage" class="control-label col-md-3">우편번호</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_zipcode') }}" name="garage_zipcode" id="garage_zipcode" value="{{ $user->user_extra ? $user->user_extra->zipcode : '' }}">
                                                        <span class="help-block">{{ trans('bcs/bcs-info.help-zipcode') }}</span>
                                                </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('garage_area') ? 'has-error' : '' }} garage_area">
                                                <label for="inputGarage" class="control-label col-md-3">시/도</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_area') }}" name="garage_area" id="garage_area" value="{{ $user->user_extra ? $user->user_extra->area : '' }}">
                                                        <span class="help-block">{{ trans('bcs/bcs-info.help-area') }}</span>
                                                </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('garage_name') ? 'has-error' : '' }} garage_section">
                                                <label for="inputGarage" class="control-label col-md-3">구/군</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_section') }}" name="garage_section" id="garage_section" value="{{ $user->user_extra ? $user->user_extra->section : '' }}">
                                                        <span class="help-block">{{ trans('bcs/bcs-info.help-section') }}</span>
                                                </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('garage_address') ? 'has-error' : '' }} garage_address">
                                                <label for="inputGarage" class="control-label col-md-3">나머지 주소</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_address') }}" name="garage_address" id="garage_address" value="{{ $user->user_extra ? $user->user_extra->address_extra : '' }}">
                                                        <span class="help-block">{{ trans('bcs/bcs-info.help-address') }}</span>
                                                </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : '' }} registration_number">
                                                <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.registration_number') }}</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.registration_number') }}" name="registration_number" id="registration_number" value="{{ $user->user_extra ? $user->user_extra->registration_number : '' }}">
                                                        {{--<span class="help-block">{{ trans('bcs/bcs-info.help-address') }}</span>--}}
                                                </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }} bank">
                                                <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.bank') }}</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.bank') }}" name="bank" id="bank" value="{{ $user->user_extra ? $user->user_extra->bcs_bank : '' }}">
                                                        <span class="help-block">{{ trans('admin/user.help-bank') }}</span>
                                                </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('account') ? 'has-error' : '' }} account">
                                                <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.account') }}</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.account') }}" name="account" id="account" value="{{ $user->user_extra ? $user->user_extra->bcs_account : '' }}">
                                                        <span class="help-block">{{ trans('admin/user.help-account') }}</span>
                                                </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('owner') ? 'has-error' : '' }} bank">
                                                <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.owner') }}</label>
                                                <div class="col-md-6 ">
                                                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.owner') }}" name="owner" id="owner" value="{{ $user->user_extra ? $user->user_extra->bcs_account_name : '' }}">
                                                        {{--<span class="help-block">{{ trans('admin/user.help-bank') }}</span>--}}
                                                </div>
                                        </div>
                                </div>


                                <!-- <div class="form-group with_eng hide">
                                        <label for="inputUserEngineer" class="control-label col-md-3">정비사 선택</label>
                                        <div class="col-md-3">
                                                <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-default" id="with_eng_lavel">
                                                                <input type="checkbox" name="with_eng" autocomplete="off" value="5"><i class="fa fa-check" aria-hidden="true"></i>
                                                                정비사
                                                        </label>
                                                </div>

                                                @if ($errors->has('with_eng'))
                                                <span class="help-block">
                                                        {{ $errors->first('with_eng') }}
                                                </span>
                                                @endif
                                        </div>
                                </div> -->




                                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                        <label for="inputMobile" class="control-label col-md-3">{{ trans('admin/user.mobile') }}</label>
                                        <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="{{ trans('admin/user.mobile') }}" name="mobile" id="inputMobile" value="{{ $user->mobile or old('mobile') }}">

                                                @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                        {{ $errors->first('mobile') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>


                                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                        <label for="inputAvatar" class="control-label col-md-3">아바타</label>
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

                                                @if ($errors->has('avatar'))
                                                <span class="help-block">
                                                        {{ $errors->first('avatar') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>

                                @if($user->hasRole('garage'))

                                        <div class="form-group attachment">
                                                <label for="" class="control-label col-md-3">정비소 이미지</label>

                                                <div class="col-md-9">

                                                        <div class="plugin-attach" id="plugin-garage_imgs"></div>

                                                        @if ($errors->has('garage_imgs'))
                                                        <span class="help-block">
                                                                {{ $errors->first('garage_imgs') }}
                                                        </span>
                                                        @endif

                                                </div>

                                        </div>


                                        <div class="form-group attachment">
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



                                @endif


                                <div class="form-group {{ $errors->has('status_cd') ? 'has-error' : '' }}">
                                        <label for="inputUserStatus" class="control-label col-md-3">{{ trans('admin/user.status') }}</label>
                                        <div class="col-md-9">
                                                <div class="btn-group" data-toggle="buttons">
                                                        @foreach($status_cd_list as $code)
                                                        <label class="btn btn-default {{ $user->status_cd == $code->id ? 'active' : '' }}">
                                                                <input type="radio" name="status_cd" autocomplete="off" {{ $user->status_cd == $code->id ? 'checked' : '' }} value="{{ $code->id }}"> {{ $code->display() }}
                                                        </label>
                                                        @endforeach
                                                </div>

                                                @if ($errors->has('status_cd'))
                                                <span class="help-block">
                                                        {{ $errors->first('status_cd') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>



                                <div class="form-group">
                                        <label for="input" class="control-label col-md-3">{{ trans('admin/user.updated_at') }}</label>
                                        <div class="col-md-4">
                                                <p class='form-control-static'>{{ $user->updated_at or '-' }}</p>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="input" class="control-label col-md-3">{{ trans('admin/user.created_at') }}</label>
                                        <div class="col-md-4">
                                                <p class='form-control-static'>{{ $user->created_at }}</p>
                                        </div>
                                </div>
                        </fieldset>


                        <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                        <a href="{{ route('user.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                                        <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}" type="submit">{{ trans('common.button.save') }}</button>

                                        @if ($user->id != 1)
                                        <button class="btn btn-danger pull-right" id="btn-user-destory" data-loading-text="{{ trans('common.button.loading') }}">{{ trans('common.button.destroy') }}</button>
                                        @endif

                                </div>
                        </div>
                        {!! Form::close() !!}

                </div>

        </div>

</div><!-- container -->

{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id], 'id'=>'frm-user-destroy']) !!}
{!! Form::close() !!}



{{-- 정비소 선택  모달 --}}
<div class="modal fade bs-example-modal-lg in purchase-modal" id="garage-modal" tabindex="-1" role="dialog" aria-labelledby="purchase-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg form-group">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title" id="myModalLabel">정비소 선택 정보</h4>
                        </div>
                        <div class="modal-body" style="overflow: auto;height: 600px;">
                                <div class='ipt_line' style="margin-bottom: 10px;">
                                        <input type='text' id="content" class='' placeholder='대리점명으로 찾기' autocomplete="off" style="padding-top: 8px;padding-bottom: 8px;height: 37px;width: 200px;">
                                        <button type="button" class="btn btn-primary" id="search" style="padding-top: 9px;">검색</button>
                                </div>
                                <table class="table text-middle text-center table-hover">
                                        {{--<colgroup>--}}
                                                {{--<col width="100%">--}}
                                                {{--</colgroup>--}}
                                                <thead>
                                                        <tr class="active">
                                                                <th class="text-center">정비소 명</th>
                                                        </tr>
                                                </thead>

                                                <tbody id="tbody">

                                                        @unless(count($garages) >0)
                                                        <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                                                        @endunless

                                                        @foreach($garages as $garage)
                                                        <tr>
                                                                <td class="text-center">
                                                                        <a class="select-garage" name="sel_garage" href="#">{{ $garage->name }}</a>
                                                                </td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                        </table>

                                </div>
                                <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-primary order-close" data-dismiss="modal" id="purchase-modal-close">닫기</button>
                                </div>
                        </div>
                </div>
        </div>

        @endsection

        @push( 'header-script' )
        <link rel="stylesheet" href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}" />
        @endpush

        @push( 'footer-script' )

        <script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
        <script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>
        @if($user->user_extra)
        <script type="text/template" id="garage_imgs-template">@include("partials/files", ['files'=> $user->user_extra->bcsimg_files])</script>
        <script type="text/template" id="qq-template">@include("partials/files", ['files'=> $user->user_extra->bcs_files])</script>
        @endif
        <script type="text/javascript">
        $(function () {



                $('#plugin-garage_imgs').fineUploader({
                        debug: true,
                        template: "garage_imgs-template",
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
                                allowedExtensions: ['jpg', 'jpeg', 'png'],
                                itemLimit: 3,
                                sizeLimit: 5120000, // 50 kB = 50 * 1024 bytes
                                stopOnFirstInvalidFile: true
                        },
                        callbacks: {
                                onSubmit: function (id, fileName) {
                                        this.setParams({'upfile_group': "bcsimg", 'upfile_group_id': "{{ $user->id }}"});
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

                $('#plugin-attachment').fineUploader({
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










                //        var load_role = $('.role_selector option:selected').val();
                var load_role = $('#user-role').val();

                // garage 랑 engineer 부분 데이터 로드
                if($.inArray("5", load_role) >= 0 && $.inArray("4", load_role) >= 0){
                        $('#garage_info').css('display', '');
                        $('.garage').css('display', 'none');
                        $('.with_eng').removeClass('hide');
                        //            $('#with_eng_lavel').click();
                }
                else if($.inArray("4", load_role) >= 0){
                        $('#garage_info').css('display', '');
                        $('.garage').css('display', 'none');
                        $('.with_eng').removeClass('hide');
                }else if($.inArray("5", load_role) >= 0){
                        $('#garage_info').css('display', 'none');
                        $('.garage').css('display', '');
                }



                var $frm = $('#frm-user-destroy');
                var $frm_target = $('#frm-user');

                $('.roles').on("click", '.role_selector', function (){
                        var roles = $('#user-role').val();

                        if($.inArray("5", roles) >= 0){
                                $('#garage_info').css('display', 'none');
                                $("#garage-modal").modal();
                        }
                        else if($.inArray("4", roles) >= 0){
                                $('#garage_info').css('display', '');
                                $('.garage').css('display', 'none');
                                $('.attachment').css('display', '');
                        }

                });

                $("#tbody").delegate(".select-garage", "click", function(){
                        $('#selected_garage').val($(this).text());
                        $('.garage').css('display', '');
                        $("#garage-modal").modal('hide');
                        $('.attachment').css('display', 'none');
                });

                $('#search').click(function (){
                        if($('#content').val() === ''){
                                alert('정비소명을 입력하세요.');
                        }else {
                                var garage_name = $('#content').val();
                                var html = '';
                                $.ajax({
                                        type : 'get',
                                        dataType : 'json',
                                        url : '/user/search_garage',
                                        data : {
                                                '_token' : '{{ csrf_token() }}',
                                                'garage_name' : garage_name,
                                        },
                                        success : function (data) {
                                                if(data.length == 0){
                                                        html += "<tr><td colspan='6' class='no-result'>{{ trans('common.no-result') }}</td></tr>";
                                                        $('#tbody').html(html);
                                                }else{
                                                        $.each(data, function (key, value) {
                                                                html += "<tr>";
                                                                html += "<td>";
                                                                html += "<a class='select-garage' name='sel_garage' href='#'>"+value.name+"</a>";
                                                                html += "</td>";
                                                                html += "</tr>";
                                                        });
                                                        $('#tbody').html(html);
                                                }
                                        },
                                        error : function (){
                                                alert('error');
                                        }
                                })
                        }
                });

                $(document).on("click", '#btn-user-destory', function (e) {

                        e.preventDefault();

                        if (confirm("{{ trans('admin/user.destroy-warning') }}")) {
                                $('#frm-user fieldset').prop("disabled", true);
                                $(this).button('loading');
                                $frm.submit();
                        }

                });
        });
        </script>
        @endpush
