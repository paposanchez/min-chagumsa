@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.config.board')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            {!! Form::open(['method' => 'POST','route' => ['board.store'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data"]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="inputName" class="control-label col-md-3">{{ trans('admin/boards.name') }}</label>
                <div class="col-md-6">
                    <input type="name" class="form-control" placeholder="{{ trans('admin/boards.name') }}" name="name" id="inputName" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                    <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('use_secret') ? 'has-error' : '' }}">
                <label for="" class="control-label col-md-3">{{ trans('admin/boards.use_secret') }}</label>
                <div class="col-md-6">
                    <div class="checkbox checkbox-slider--b-flat">
                        <label>
                            <input type="checkbox" value="1" name="use_secret" {{ old('use_secret') == 1 ? 'checked="checked"' : '' }}><span></span>
                        </label>
                    </div>

                    @if ($errors->has('use_secret'))
                    <span class="help-block">
                        {{ $errors->first('use_secret') }}
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('use_captcha') ? 'has-error' : '' }}">
                <label for="" class="control-label col-md-3">{{ trans('admin/boards.use_captcha') }}</label>
                <div class="col-md-6">
                    <div class="checkbox checkbox-slider--b-flat">
                        <label>
                            <input type="checkbox" value="1" name="use_captcha" {{ old('use_captcha') == 1 ? 'checked="checked"' : '' }}><span></span>
                        </label>
                    </div>

                    @if ($errors->has('use_captcha'))
                    <span class="help-block">
                        {{ $errors->first('use_captcha') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('use_comment') ? 'has-error' : '' }}">
                <label for="" class="control-label col-md-3">{{ trans('admin/boards.use_comment') }}</label>
                <div class="col-md-6">
                    <div class="checkbox checkbox-slider--b-flat">
                        <label>
                            <input type="checkbox" value="1" name="use_comment" {{ old('use_comment') == 1 ? 'checked="checked"' : '' }}><span></span>
                        </label>
                    </div>

                    @if ($errors->has('use_comment'))
                    <span class="help-block">
                        {{ $errors->first('use_comment') }}
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('use_opinion') ? 'has-error' : '' }}">
                <label for="" class="control-label col-md-3">{{ trans('admin/boards.use_opinion') }}</label>
                <div class="col-md-6">
                    <div class="checkbox checkbox-slider--b-flat">
                        <label>
                            <input type="checkbox" value="1" name="use_opinion" {{ old('use_opinion') == 1 ? 'checked="checked"' : '' }}><span></span>
                        </label>
                    </div>

                    @if ($errors->has('use_opinion'))
                    <span class="help-block">
                        {{ $errors->first('use_opinion') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('use_tag') ? 'has-error' : '' }}">
                <label for="" class="control-label col-md-3">{{ trans('admin/boards.use_tag') }}</label>
                <div class="col-md-6">
                    <div class="checkbox checkbox-slider--b-flat">
                        <label>
                            <input type="checkbox" value="1" name="use_tag" {{ old('use_tag') == 1 ? 'checked="checked"' : '' }}><span></span>
                        </label>
                    </div>

                    @if ($errors->has('use_tag'))
                    <span class="help-block">
                        {{ $errors->first('use_tag') }}
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('use_category') ? 'has-error' : '' }}">
                <label for="" class="control-label col-md-3">{{ trans('admin/boards.use_category') }}</label>
                <div class="col-md-6">
                    <div class="checkbox checkbox-slider--b-flat">
                        <label>
                            <input type="checkbox" value="1" name="use_category" {{ old('use_category') == 1 ? 'checked="checked"' : '' }}><span></span>
                        </label>
                    </div>

                    @if ($errors->has('use_category'))
                    <span class="help-block">
                        {{ $errors->first('use_category') }}
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('use_upload') ? 'has-error' : '' }}">
                <label for="" class="control-label col-md-3">{{ trans('admin/boards.use_upload') }}</label>
                <div class="col-md-6">
                    <div class="checkbox checkbox-slider--b-flat">
                        <label>
                            <input type="checkbox" value="1" name="use_upload" {{ old('use_upload') == 1 ? 'checked="checked"' : '' }}><span></span>
                        </label>
                    </div>

                    @if ($errors->has('use_upload'))
                    <span class="help-block">
                        {{ $errors->first('use_upload') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('use_thumbnail') ? 'has-error' : '' }}">
                <label for="" class="control-label col-md-3">{{ trans('admin/boards.use_thumbnail') }}</label>
                <div class="col-md-6">
                    <div class="checkbox checkbox-slider--b-flat">
                        <label>
                            <input type="checkbox" value="1" name="use_thumbnail" {{ old('use_thumbnail') == 1 ? 'checked="checked"' : '' }}><span></span>
                        </label>
                    </div>

                    @if ($errors->has('use_thumbnail'))
                    <span class="help-block">
                        {{ $errors->first('use_thumbnail') }}
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('upload_max_filesize') ? 'has-error' : '' }}">
                <label for="inputUploadMaxFilesize" class="control-label col-md-3">{{ trans('admin/boards.upload_max_filesize') }}</label>
                <div class="col-md-4">

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{ trans('admin/boards.upload_max_filesize') }}" name="upload_max_filesize" id="inputUploadMaxFilesize" value="{{ old('upload_max_filesize') ? old('upload_max_filesize') : 0 }}">
                        <span class="input-group-addon">kb</span>
                    </div>

                    @if ($errors->has('upload_max_filesize'))
                    <span class="help-block">
                        {{ $errors->first('upload_max_filesize') }}
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('upload_max_limit') ? 'has-error' : '' }}">
                <label for="inputUploadMaxLimit" class="control-label col-md-3">{{ trans('admin/boards.upload_max_limit') }}</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="{{ trans('admin/boards.upload_max_limit') }}" name="upload_max_limit" id="inputUploadMaxLimit" value="{{ old('upload_max_limit') ? old('upload_max_limit') : 0 }}">                        

                    @if ($errors->has('upload_max_limit'))
                    <span class="help-block">
                        {{ $errors->first('upload_max_limit') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('status_cd') ? 'has-error' : '' }}">
                <label for="inputStatusCd" class="control-label col-md-3">{{ trans('admin/boards.status_cd') }}</label>
                <div class="col-md-4">
                    {!! Form::select('status_cd', $status_cd_list, '', ['class'=>'form-control', 'id'=>'inputStatusCd']) !!}


                    @if ($errors->has('status_cd'))
                    <span class="help-block">
                        {{ $errors->first('status_cd') }}
                    </span>
                    @endif
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    <a href="{{ route('board.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                    <button class="btn btn-success" data-loading-text="{{ trans('common.button.loading') }}" type="submit">{{ trans('common.button.save') }}</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

</div><!-- container -->
@endsection


@section( 'footer-script' )
<script type="text/javascript">
</script>
@endsection
