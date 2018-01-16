@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>신규 포스팅 생성
                        <!-- <small>새로운 주문을 생성한다..</small> -->
                    </h2>

                    <ul class="actions">
                        <li>
                            <a href="" class="goback">
                                <i class="zmdi zmdi-view-list"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding">
                    {!! Form::open(['method' => 'POST','route' => ['posting.store'], 'class'=>'form-horizontal', 'id'=>'frmPost', 'enctype'=>"multipart/form-data"]) !!}

                    <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                        <label for="inputSubject"
                               class="control-label col-md-2">{{ trans('admin/post.subject') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/post.subject') }}"
                                   name="subject" id="inputSubject" value="{{ old('subject') }}">

                            @if ($errors->has('subject'))
                                <span class="help-block">
                        {{ $errors->first('subject') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}" id="wysiwyg">
                        <label for="inputContent"
                               class="control-label col-md-2">{{ trans('admin/post.content') }}</label>
                        <div class="col-md-9">
                    <textarea class="form-control wysiwyg" placeholder="{{ trans('admin/post.content') }}"
                              name="content" id="inputContent1">
                        {{ old('content') }}
                    </textarea>

                            @if ($errors->has('content'))
                                <span class="help-block">
                        {{ $errors->first('content') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }} disabled" id="none-wysiwyg"
                         style="display: none;">
                        <label for="inputContent"
                               class="control-label col-md-2">{{ trans('admin/bcs-post.content') }}</label>
                        <div class="col-md-9">
                            {{--<textarea  class="form-control wysiwyg" placeholder="{{ trans('admin/post.content') }}" name="content" id="inputContent">--}}
                            <textarea class="form-control" placeholder="{{ trans('admin/bcs-post.content') }}"
                                      name="content2" id="inputContent2"
                                      style="height: 250px;">{{ $post->content or old('content') }}</textarea>

                            @if ($errors->has('content'))
                                <span class="help-block">
                            {{ $errors->first('content') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('board_id') ? 'has-error' : '' }}">
                        <label for="inputBoardId"
                               class="control-label col-md-2">{{ trans('admin/post.board_id') }}</label>
                        <div class="col-md-4">
                            {!! Form::select('board_id', $board_list, 'Y', ['class'=>'form-control', 'id'=>'inputBoardId']) !!}

                            @if ($errors->has('board_id'))
                                <span class="help-block">
                        {{ $errors->first('board_id') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    {{-- category select --}}
                    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : 'category' }}"
                         style="display: none;">
                        <label for="inputCategoryId"
                               class="control-label col-md-2">{{ trans('admin/post.category') }}</label>
                        <div class="col-md-4">
                            <select class="form-control" name="category_id">
                                @foreach($categorys as $category)
                                    <option value="{{ $category->id }}">{{ \App\Helpers\Helper::getCodeName($category->id) }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('user_id'))
                                <span class="help-block">
                        {{ $errors->first('user_id') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-2">{{ trans('admin/post.name') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/post.name') }}"
                                   name="name"
                                   id="inputName" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-md-2">{{ trans('admin/post.email') }}</label>
                        <div class="col-md-4">
                            <input type="email" class="form-control" placeholder="{{ trans('admin/post.email') }}"
                                   name="email" id="inputEmail"
                                   value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    {{--<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">--}}
                        {{--<label for="inputPassword"--}}
                               {{--class="control-label col-md-2">{{ trans('admin/post.password') }}</label>--}}
                        {{--<div class="col-md-4">--}}
                            {{--<input type="password" class="form-control" placeholder="{{ trans('admin/post.password') }}"--}}
                                   {{--name="password" id="inputPassword">--}}

                            {{--@if ($errors->has('password'))--}}
                                {{--<span class="help-block">--}}
                        {{--{{ $errors->first('password') }}--}}
                    {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group {{ $errors->has('is_answered') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-2">{{ trans('admin/post.is_answered') }}</label>
                        <div class="col-md-6">
                            <div class="checkbox checkbox-slider--b-flat" style="padding-top: 7px !important;">
                                <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                    <input id="ts4" name="is_answered" type="checkbox" hidden="hidden" value="1">
                                    <label for="ts4" class="ts-helper"></label>
                                </div>
                            </div>
                            @if ($errors->has('is_answered'))
                                <span class="help-block">
                                                                                                        {{ $errors->first('is_answered') }}
                                                                                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('is_shown') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-2">{{ trans('admin/post.is_shown') }}</label>
                        <div class="col-md-4">

                            {!! Form::select('is_shown', $shown_role_list, [], ['class'=>'form-control', 'id'=>'post-is_shown']) !!}

                            @if ($errors->has('is_shown'))
                                <span class="help-block">
                        {{ $errors->first('is_shown') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : 'roles' }}">
                        <label for="inputRoles" class="control-label col-md-2">열람권한</label>
                        <div class="col-md-4">


                            {!! Form::select('roles[]', $roles, [], ['class'=>'form-control', 'multiple', 'id'=>'user-role']) !!}

                            @if ($errors->has('roles'))
                                <span class="help-block">
                                                {{ $errors->first('roles') }}
                                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('tag') ? 'has-error' : '' }}">
                        <label for="inputTag" class="control-label col-md-2">{{ trans('admin/post.tag') }}</label>
                        <div class="col-md-4">
                            <select name="tag" id="inputTag" multiple style="width: 100%"></select>

                            @if ($errors->has('tag'))
                                <span class="help-block">
                        {{ $errors->first('tag') }}
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-2">{{ trans('admin/post.thumbnail') }}</label>

                        <div class="col-md-9">

                            <div class="plugin-attach" id="plugin-thumbnail">

                                <div class="btn btn-primary btn-block plugin-attach-add" id="plugin-thumbnail-add"><i
                                            class="fa fa-plus"></i> {{ trans('common.button.file-select') }}</div>

                                <div class="plugin-attach-files list-group">

                                </div>

                            </div>

                            @if ($errors->has('thumbnail'))
                                <span class="help-block">
                        {{ $errors->first('thumbnail') }}
                    </span>
                            @endif

                        </div>

                    </div>

                    <!-- 파일 업로드 -->
                    <div class="form-group {{ $errors->has('attachment') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-2">{{ trans('admin/post.attachment') }}</label>

                        <div class="col-md-9">


                            <div class="plugin-attach" id="plugin-attachment">

                                @if ($errors->has('attachment'))
                                    <span class="help-block">
                            {{ $errors->first('attachment') }}
                        </span>
                                @endif

                            </div>


                            @if ($errors->has('attachment'))
                                <span class="help-block">
                        {{ $errors->first('attachment') }}
                    </span>
                            @endif

                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-2">
                            <a href="{{ route('posting.index') }}" class="btn btn-default"><i
                                        class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                            <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                    type="submit">{{ trans('common.button.save') }}</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection


@push( 'header-script' )
    <link rel="stylesheet" href="{{ Helper::assets( 'vendor/summernote/summernote.css' ) }}"/>
    <link rel="stylesheet" href="{{ Helper::assets( 'vendor/select2/css/select2.min.css' ) }}"/>
@endpush

@push( 'footer-script' )
    <script src="{{ Helper::assets( 'vendor/summernote/summernote.min.js' ) }}"></script>
    <script src="{{ Helper::assets( 'vendor/select2/js/select2.full.min.js' ) }}"></script>
    <script src="{{ Helper::assets( 'vendor/select2/js/i18n/ko.js' ) }}"></script>
    <script type="text/template" id="qq-template">@include("partials/files")</script>
    <link rel="stylesheet"
          href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}"/>
    <script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
    <script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>
    <script src="{{ Helper::assets( 'js/plugin/post.js' ) }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
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
        });

        $('#inputBoardId').change(function () {
            var board_category = $('#inputBoardId option:selected').val();
            if (board_category == 2) {
                $('.category').css('display', '');
                $('#wysiwyg').css('display', '');
                $('#none-wysiwyg').css('display', 'none');
            }
            else if (board_category == 4) {
                $('#wysiwyg').css('display', 'none');
                $('#none-wysiwyg').css('display', '');
            }
            else {
                $('.category').css('display', 'none');
                $('#wysiwyg').css('display', '');
                $('#none-wysiwyg').css('display', 'none');
            }
        });

        if ($('.wysiwyg').length > 0) {
            $('.wysiwyg').each(function () {
                var $this = $(this);
                $this.summernote({
                    height: 300,
                    lang: 'ko-KR', // default: 'en-US'
                    callbacks: {
                        onImageUpload: function (files, editor, welEditable) {

                            var editor = $(this);
                            var data = new FormData();
                            data.append("upfile", files[0]);
                            $.ajax({
                                data: data,
                                type: "POST",
                                url: "/file/image",
                                dataType: 'json',
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function (response) {
                                    if (response && response.success == true) {
                                        $this.summernote('insertImage', '/thumbnail/' + response.data.id);
                                    }
                                }
                            });
                        },
                        onChange: function (contents, $editable) {
                            $this.val(contents);
                        }
                    }
                });
            });
        }
        // $('.date-picker').datetimepicker({
        //     format: 'YYYY-MM-DD'
        // });
    </script>
@endpush
