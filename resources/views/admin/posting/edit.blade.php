@extends( 'admin.layouts.default' )

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::model($post, ['method' => 'PATCH','route' => ['post.update', $post->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
                <fieldset>
                    <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                        <label for="inputSubject"
                               class="control-label col-md-3">{{ trans('admin/post.subject') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/post.subject') }}"
                                   name="subject" id="inputSubject" value="{{ $post->subject or old('subject') }}">

                            @if ($errors->has('subject'))
                                <span class="help-block">
                                                        {{ $errors->first('subject') }}
                                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="inputContent"
                               class="control-label col-md-3">{{ trans('admin/post.content') }}</label>
                        <div class="col-md-9">
                                                <textarea class="form-control
                                                @if($post->board->use_tag)
                                                        wysiwyg
@endif
                                                        " placeholder="{{ trans('admin/post.content') }}" name="content"
                                                          id="inputContent"
                                                          style="height: 250px;">{{ nl2br($post->content) }}</textarea>

                            @if ($errors->has('content'))
                                <span class="help-block">
                                                        {{ $errors->first('content') }}
                                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('board_id') ? 'has-error' : '' }}">
                        <label for="inputBoardId"
                               class="control-label col-md-3">{{ trans('admin/post.board_id') }}</label>
                        <div class="col-md-4">
                            {!! Form::select('board_id', $board_list, $post->board_id, ['class'=>'form-control', 'id'=>'inputBoardId']) !!}

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
                               class="control-label col-md-3">{{ trans('admin/post.category') }}</label>
                        <div class="col-md-4">
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categorys as $category)
                                    <option value="{{ $category->id }}">{{ \App\Helpers\Helper::getCodeName($category->id) }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('category'))
                                <span class="help-block">
                                                        {{ $errors->first('category') }}
                                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-3">{{ trans('admin/post.name') }}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/post.name') }}"
                                   name="name" id="inputName" value="{{ $post->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                                                                {{ $errors->first('name') }}
                                                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-md-3">{{ trans('admin/post.email') }}</label>
                        <div class="col-md-4">
                            <input type="email" class="form-control" placeholder="{{ trans('admin/post.email') }}"
                                   name="email" id="inputEmail" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                                                                {{ $errors->first('email') }}
                                                                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
                        <label for="inputContent" class="control-label col-md-3">답변</label>
                        <div class="col-md-9">
                                                                                                <textarea
                                                                                                        class="form-control wysiwyg"
                                                                                                        placeholder=""
                                                                                                        name="answer"
                                                                                                        id="inputAnswer"
                                                                                                        style="height: 250px;">{{ $post->answer or old('answer') }}</textarea>
                            @if ($errors->has('answer'))
                                <span class="help-block">
                                                                                                        {{ $errors->first('answer') }}
                                                                                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('is_answered') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.is_answered') }}</label>
                        <div class="col-md-6">
                            <div class="checkbox checkbox-slider--b-flat">
                                <label>
                                    <input type="checkbox" value="1"
                                           name="is_answered" {{ $post->is_answered == 1 ? 'checked="checked"' : '' }}><span></span>
                                </label>
                            </div>

                            @if ($errors->has('is_answered'))
                                <span class="help-block">
                                                                                                        {{ $errors->first('is_answered') }}
                                                                                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('is_shown') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.is_shown') }}</label>
                        <div class="col-md-4">

                            {!! Form::select('is_shown', $shown_role_list, $post->is_shown, ['class'=>'form-control', 'id'=>'post-is_shown']) !!}

                            @if ($errors->has('is_shown'))
                                <span class="help-block">
                                                                                                        {{ $errors->first('is_shown') }}
                                                                                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('tag') ? 'has-error' : '' }}">
                        <label for="inputTag" class="control-label col-md-3">{{ trans('admin/post.tag') }}</label>
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
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.thumbnail') }}</label>

                        <div class="col-md-9">

                            <div class="plugin-attach" id="plugin-thumbnail">
                                <div class="btn btn-primary btn-block plugin-attach-add" id="plugin-thumbnail-add"><i
                                            class="fa fa-plus"></i> {{ trans('common.button.file-select') }}</div>
                                <div class="plugin-attach-files list-group"></div>
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
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.attachment') }}</label>

                        <div class="col-md-9">

                            <div class="plugin-attach" id="plugin-attachment"></div>

                            @if ($errors->has('attachment'))
                                <span class="help-block">
                                                                                                                {{ $errors->first('attachment') }}
                                                                                                        </span>
                            @endif

                        </div>

                    </div>


                    <div class="form-group ">
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.created_at') }}</label>

                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD hh:mm:ss"
                                       placeholder="{{ trans('admin/post.created_at') }}" name='created_at'
                                       value='{{ $post->created_at }}'>
                            </div>
                        </div>

                    </div>
                    <div class="form-group ">
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.updated_at') }}</label>

                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD hh:mm:ss"
                                       placeholder="{{ trans('admin/post.updated_at') }}" name='updated_at'
                                       value='{{ $post->updated_at }}'>
                            </div>
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

                </fieldset>
                {!! Form::close() !!}

            </div>
        </div>

    </div><!-- container -->
@endsection


@push( 'header-script' )
    <link rel="stylesheet" href="{{ Helper::assets( 'vendor/summernote/summernote.css' ) }}"/>
    <link rel="stylesheet" href="{{ Helper::assets( 'vendor/select2/css/select2.min.css' ) }}"/>
@endpush

@push( 'footer-script' )
    <script src="{{ Helper::assets( 'vendor/summernote/summernote.min.js' ) }}"></script>
    <script src="{{ Helper::assets( 'vendor/select2/js/select2.full.min.js' ) }}"></script>
    <script src="{{ Helper::assets( 'vendor/select2/js/i18n/ko.js' ) }}"></script>
    <script type="text/template" id="qq-template">@include("partials/files", ['files'=> $post->files])</script>
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
                    //            allowedExtensions: ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'hwp'],
                    itemLimit: 3,
                    sizeLimit: 5120000, // 50 kB = 50 * 1024 bytes
                    stopOnFirstInvalidFile: true
                },
                callbacks: {
                    onSubmit: function (id, fileName) {
                        this.setParams({'upfile_group': "post", 'upfile_group_id': "{{ $post->id }}"});
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

            $('#inputBoardId').change(function () {
                if ($('#inputBoardId option:selected').val() == 2) {
                    $('.category').css('display', '');
                }
                else {
                    $('.category').css('display', 'none');
                }
            });

            if ($('#inputBoardId').val() == 2) {

                $('.category').css('display', '');
                $('#category_id').val({{ $post->category_id }});

            }
        });
    </script>
@endpush
