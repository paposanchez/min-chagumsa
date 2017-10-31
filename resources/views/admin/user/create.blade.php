@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.user')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::open(['method' => 'POST','route' => ['user.store'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data"]) !!}
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="inputEmail" class="control-label col-md-3">{{ trans('admin/user.email') }}</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="{{ trans('admin/user.email') }}"
                               name="email" id="inputEmail" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                                {{ $errors->first('email') }}
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="inputName" class="control-label col-md-3"
                           id="name_title">{{ trans('admin/user.name') }}</label>
                    <div class="col-md-6">
                        <input type="name" class="form-control" placeholder="{{ trans('admin/user.name') }}" name="name"
                               id="inputName" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                                {{ $errors->first('name') }}
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="inputPassword" class="control-label col-md-3">{{ trans('admin/user.password') }}</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" placeholder="{{ trans('admin/user.password') }}"
                               name="password" id="inputPassword">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                                {{ $errors->first('password') }}
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <label for="inputPasswordConfirmation"
                           class="control-label col-md-3">{{ trans('admin/user.password_confirmation') }}</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control"
                               placeholder="{{ trans('admin/user.password_confirmation') }}"
                               name="password_confirmation" id="inputPasswordConfirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                                {{ $errors->first('password_confirmation') }}
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                    <label for="inputMobile" class="control-label col-md-3">{{ trans('admin/user.mobile') }}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ trans('admin/user.mobile') }}"
                               name="mobile" id="inputMobile" value="{{ old('mobile') }}">

                        @if ($errors->has('mobile'))
                            <span class="help-block">
                                                {{ $errors->first('mobile') }}
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('roles') ? 'has-error' : 'roles' }}">
                    <label for="inputRoles" class="control-label col-md-3">{{ trans('admin/user.roles') }}</label>
                    <div class="col-md-6">


                        {!! Form::select('roles[]', $roles, [], ['class'=>'form-control', 'multiple', 'id'=>'user-role']) !!}

                        @if ($errors->has('roles'))
                            <span class="help-block">
                                                {{ $errors->first('roles') }}
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('garage') ? 'has-error' : '' }} garage" style="display: none;">
                    <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.garage') }}</label>
                    <div class="col-md-6 selected_garage">
                        <input type="text" class="form-control" name="garage" id="selected_garage" value="" readonly>
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
                            {!! Form::select('aliance_id', $aliances, [], ['class'=>'form-control', 'multiple', 'id'=>'aliance']) !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('garage_name') ? 'has-error' : '' }} garage_name">
                        <label for="inputGarage" class="control-label col-md-3">정비소 대표자명</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_name') }}"
                                   name="garage_name" id="garage_name" value="{{ old('garage_name') }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('garage_tel') ? 'has-error' : '' }} garage_tel">
                        <label for="inputGarage" class="control-label col-md-3">정비소 전화번호</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_tel') }}"
                                   name="garage_tel" id="garage_tel" value="{{ old('garage_tel') }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
                        <label for="fax" class="control-label col-md-3">{{ trans('bcs/bcs-info.fax') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('bcs/bcs-info.fax') }}"
                                   name="fax" id="fax" value="{{ old('fax') }}">

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
                            <input type="text" class="form-control"
                                   placeholder="{{ trans('admin/user.garage_zipcode') }}" name="garage_zipcode"
                                   id="garage_zipcode" value="">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-zipcode') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('garage_area') ? 'has-error' : '' }} garage_area">
                        <label for="inputGarage" class="control-label col-md-3">시/도</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.garage_area') }}"
                                   name="garage_area" id="garage_area" value="">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-area') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('garage_name') ? 'has-error' : '' }} garage_section">
                        <label for="inputGarage" class="control-label col-md-3">구/군</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control"
                                   placeholder="{{ trans('admin/user.garage_section') }}" name="garage_section"
                                   id="garage_section" value="">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-section') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('garage_address') ? 'has-error' : '' }} garage_address">
                        <label for="inputGarage" class="control-label col-md-3">나머지 주소</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control"
                                   placeholder="{{ trans('admin/user.garage_address') }}" name="garage_address"
                                   id="garage_address" value="">
                            <span class="help-block">{{ trans('bcs/bcs-info.help-address') }}</span>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : '' }} registration_number">
                        <label for="inputGarage"
                               class="control-label col-md-3">{{ trans('admin/user.registration_number') }}</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control"
                                   placeholder="{{ trans('admin/user.registration_number') }}"
                                   name="registration_number" id="registration_number" value="">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }} bank">
                        <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.bank') }}</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.bank') }}"
                                   name="bank" id="bank" value="">
                            <span class="help-block">{{ trans('admin/user.help-bank') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('account') ? 'has-error' : '' }} account">
                        <label for="inputGarage"
                               class="control-label col-md-3">{{ trans('admin/user.account') }}</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.account') }}"
                                   name="account" id="account" value="">
                            <span class="help-block">{{ trans('admin/user.help-account') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('owner') ? 'has-error' : '' }} bank">
                        <label for="inputGarage" class="control-label col-md-3">{{ trans('admin/user.owner') }}</label>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/user.owner') }}"
                                   name="owner" id="owner" value="">
                            <span class="help-block">{{ trans('admin/user.help-bank') }}</span>
                        </div>
                    </div>

                </div>


                <div class="form-group with_eng hide">
                    <label for="inputUserEngineer" class="control-label col-md-3">정비사 선택</label>
                    <div class="col-md-3">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="checkbox" name="with_eng" autocomplete="off" value="5"><i
                                        class="fa fa-check" aria-hidden="true"></i>
                                정비사
                            </label>
                        </div>

                        @if ($errors->has('with_eng'))
                            <span class="help-block">
                                                {{ $errors->first('with_eng') }}
                                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group {{ $errors->has('status_cd') ? 'has-error' : '' }}">
                    <label for="inputUserStatus" class="control-label col-md-3">{{ trans('admin/user.status') }}</label>
                    <div class="col-md-3">
                        <div class="btn-group" data-toggle="buttons">
                            @foreach($status_cd_list as $code)
                                <label class="btn btn-default
                                                @if($code->id == 1)
                                        active
@endif
                                        ">
                                    <input type="radio" name="status_cd" autocomplete="off"
                                           @if($code->id == 1)
                                           checked
                                           @endif
                                           value="{{ $code->id }}"> {{ $code->display() }}
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


                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                    <label for="inputAvatar" class="control-label col-md-3">{{ trans('admin/user.avatar') }}</label>
                    <div class="col-md-6">
                        <div class="fileinput fileinput-new" data-provides="fileinput">

                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                {{ Html::image('/avatar', 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"
                                 style="max-width: 200px; max-height: 200px;"></div>
                            <div>
                                                        <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">{{ trans('common.button.file-select') }}</span>
                                                                <span class="fileinput-exists">{{ trans('common.button.change') }}</span>
                                                                <input type="file"
                                                                       placeholder="{{ trans('admin/user.avatar') }}"
                                                                       name="avatar" id="inputAvatar">
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

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <a href="{{ route('user.index') }}" class="btn btn-default"><i
                                    class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                        <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                type="submit">{{ trans('common.button.save') }}</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>


    {{-- 정비소 선택  모달 --}}
    <div class="modal fade bs-example-modal-lg in purchase-modal" id="garage-modal" tabindex="-1" role="dialog"
         aria-labelledby="purchase-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg form-group">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">정비소 선택 정보</h4>
                </div>
                <div class="modal-body" style="overflow: auto;height: 600px;">
                    <div class='ipt_line' style="margin-bottom: 10px;">
                        <input type='text' id="content" class='' placeholder='대리점명으로 찾기' autocomplete="off"
                               style="padding-top: 8px;padding-bottom: 8px;height: 37px;width: 200px;">
                        <button type="button" class="btn btn-primary" id="search" style="padding-top: 9px;">검색</button>
                    </div>
                    <table class="table text-middle text-center table-hover">
                        <thead>
                        <tr class="active">
                            <th class="text-center">정비소 명</th>
                        </tr>
                        </thead>

                        <tbody id="tbody">

                        @unless(count($garages) >0)
                            <tr>
                                <td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>
                            </tr>
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
                    <button type="button" class="btn btn-primary order-close" data-dismiss="modal"
                            id="purchase-modal-close">닫기
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection


@push( 'footer-script' )
    <link rel="stylesheet"
          href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}"/>
    <script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
    <script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>
    <script type="text/template" id="qq-template">@include("partials/files")</script>
    <script type="text/javascript">
        $(function () {
            $('.roles').on("click", '#user-role', function () {
                var roles = $('#user-role').val();

                if ($.inArray("4", roles) >= 0) {

                    $('#garage_info').css('display', '');
                    $('.garage').css('display', 'none');
                    $('#garage_name').val('');
                    $('#garage_tel').val('');
                    $('#garage_zipcode').val('');
                    $('#garage_area').val('');
                    $('#garage_section').val('');
                    $('#garage_address').val('');
                    $('.with_eng').removeClass('hide');
                    $('.attachment').css('display', '');
                }
                else if ($.inArray("5", roles) >= 0) {
                    $('#garage_info').css('display', 'none');
                    $("#garage-modal").modal();
                }
                else {
                    $('.garage').css('display', 'none');
                    $('#garage_info').css('display', 'none');
                    $('#selected_garage').val('');
                    $('.attachment').css('display', 'none');
                }
            });

            $("#tbody").delegate(".select-garage", "click", function () {
                $('#selected_garage').val($(this).text());
                $('.garage').css('display', '');
                $("#garage-modal").modal('hide');
            });

            $('#search').click(function () {
                if ($('#content').val() === '') {
                    alert('정비소명을 입력하세요.');
                } else {
                    var garage_name = $('#content').val();
                    var html = '';
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/user/search_garage',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'garage_name': garage_name,
                        },
                        success: function (data) {
                            if (data.length == 0) {
                                html += "<tr><td colspan='6' class='no-result'>{{ trans('common.no-result') }}</td></tr>";
                                $('#tbody').html(html);
                            } else {
                                $.each(data, function (key, value) {
                                    html += "<tr>";
                                    html += "<td>";
                                    html += "<a class='select-garage' name='sel_garage' href='#'>" + value.name + "</a>";
                                    html += "</td>";
                                    html += "</tr>";
                                });
                                $('#tbody').html(html);
                            }
                        },
                        error: function (data) {
                            alert('오류가 발생했습니다. 관리자에게 문의하세요.');
                        }
                    })
                }
            });

            $('#plugin-attachment').fineUploader({
                debug: true,
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
                    allowedExtensions: ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'hwp'],
                    itemLimit: 3,
                    sizeLimit: 5120000, // 50 kB = 50 * 1024 bytes
                    stopOnFirstInvalidFile: true
                },
                text: {
                    uploadButton: 'Upload a file',
                    cancelButton: 'Cancel',
                    retryButton: 'Retry',
                    failUpload: 'Upload failed',
                    dragZone: 'Drop files here to upload',
                    formatProgress: "{percent}% of {total_size}",
                    waitingForResponse: "Processing..."
                },
                messages: {
                    typeError: "{file} has an invalid extension. Valid extension(s): {extensions}.",
                    sizeError: "{file} is too large, maximum file size is {sizeLimit}.",
                    minSizeError: "{file} is too small, minimum file size is {minSizeLimit}.",
                    emptyError: "{file} is empty, please select files again without it.",
                    noFilesError: "No files to upload.",
                    onLeave: "The files are being uploaded, if you leave now the upload will be cancelled."
                },
                callbacks: {
                    onSubmit: function (id, fileName) {
                        this.setParams({'upfile_group': "bcs"});
                    },
                    onComplete: function (id, fileName, responseJSON) {
                        if (responseJSON.success == true) {
                            $.notify(responseJSON.msg, "success");

                            var $listItem = $(this).fineUploader('getItemByFileId', id);
                            $listItem.find('.plugin-attach-file-input').val(responseJSON.data.id);

                        } else {
                            $.notify(responseJSON.msg, "error");
                        }
                    }


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
