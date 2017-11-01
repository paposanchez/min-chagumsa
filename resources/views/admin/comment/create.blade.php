@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.comment')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::open(['method' => 'POST','route' => ['comment.store'], 'class'=>'form-horizontal', 'id'=>'frmPost', 'enctype'=>"multipart/form-data"]) !!}

                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label for="inputContent"
                           class="control-label col-md-3">{{ trans('admin/comment.content') }}</label>
                    <div class="col-md-9">
                    <textarea class="form-control wysiwyg" placeholder="{{ trans('admin/comment.content') }}"
                              name="content" id="inputContent">
                        {{ old('content') }}
                    </textarea>

                        @if ($errors->has('content'))
                            <span class="help-block">
                        {{ $errors->first('content') }}
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('post_id') ? 'has-error' : '' }}">
                    <label for="inputUserId" class="control-label col-md-3">{{ trans('admin/comment.post_id') }}</label>
                    <div class="col-md-4">
                        <select name="post_id" id="inputUserId" style="width: 100%"></select>

                        @if ($errors->has('post_id'))
                            <span class="help-block">
                        {{ $errors->first('post_id') }}
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                    <label for="inputParent" class="control-label col-md-3">{{ trans('admin/comment.parent') }}</label>
                    <div class="col-md-4">
                        <select name="parent" id="inputParent" style="width: 100%"></select>

                        @if ($errors->has('parent'))
                            <span class="help-block">
                        {{ $errors->first('parent') }}
                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="inputName" class="control-label col-md-3">{{ trans('admin/comment.name') }}</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="{{ trans('admin/comment.name') }}"
                               name="name" id="inputName" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="inputEmail" class="control-label col-md-3">{{ trans('admin/comment.email') }}</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" placeholder="{{ trans('admin/comment.email') }}"
                               name="email" id="inputEmail" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="inputPassword"
                           class="control-label col-md-3">{{ trans('admin/comment.password') }}</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" placeholder="{{ trans('admin/comment.password') }}"
                               name="password" id="inputPassword">

                        @if ($errors->has('password'))
                            <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group {{ $errors->has('is_shown') ? 'has-error' : '' }}">
                    <label for="" class="control-label col-md-3">{{ trans('admin/comment.is_shown') }}</label>
                    <div class="col-md-4">

                        {!! Form::select('is_shown', $shown_role_list, [], ['class'=>'form-control', 'id'=>'post-is_shown']) !!}

                        @if ($errors->has('is_shown'))
                            <span class="help-block">
                        {{ $errors->first('is_shown') }}
                    </span>
                        @endif
                    </div>
                </div>

                <!-- 파일 업로드 -->
                <div class="form-group {{ $errors->has('attachment') ? 'has-error' : '' }}">
                    <label for="" class="control-label col-md-3">{{ trans('admin/comment.attachment') }}</label>

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
                    <div class="col-md-9 col-md-offset-3">
                        <a href="{{ route('post.index') }}" class="btn btn-default"><i
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


@push( 'header-script' )
    <link rel="stylesheet" href="{{ Helper::assets( 'vendor/summernote/summernote.css' ) }}"/>
    <link rel="stylesheet" href="{{ Helper::assets( 'vendor/select2/select2.min.css' ) }}"/>
@endpush

@push( 'footer-script' )
    <script src="{{ Helper::assets( 'vendor/summernote/summernote.min.js' ) }}"></script>
    <script src="{{ Helper::assets( 'vendor/select2/select2.full.min.js' ) }}"></script>
    <script src="{{ Helper::assets( 'vendor/select2/js/i18n/ko.js' ) }}"></script>
    <script src="{{ Helper::assets( 'js/plugin/post.js' ) }}"></script>

    <script type="text/template" id="qq-template">@include("partials/files")</script>
    <link rel="stylesheet"
          href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}"/>
    <script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
    <script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>
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
    </script>
@endpush
