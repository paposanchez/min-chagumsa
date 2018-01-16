@extends( 'admin.layouts.default' )

@section( 'content' )


    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>게시판 수정
                        <!-- <small>새로운 주문을 생성한다..</small> -->
                    </h2>

                    <ul class="actions">
                        <li>
                            <a href="/config/board" class="goback">
                                <i class="zmdi zmdi-view-list"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding">
                    {!! Form::model($board, ['method' => 'PATCH','route' => ['board.update', $board->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
                    <fieldset>

                        <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                            <label for="inputId" class="control-label col-md-3">{{ trans('admin/board.id') }}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="{{ trans('admin/board.id') }}"
                                       disabled="" id="inputId" value="{{ $board->id or old('id') }}">

                                @if ($errors->has('id'))
                                    <span class="help-block">
                            {{ $errors->first('id') }}
                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="inputName"
                                   class="control-label col-md-3">{{ trans('admin/board.name') }}</label>
                            <div class="col-md-9">
                                <input type="name" class="form-control" placeholder="{{ trans('admin/board.name') }}"
                                       name="name" id="inputName" value="{{ $board->name or old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('use_secret') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">{{ trans('admin/board.use_secret') }}</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-slider--b-flat" style="padding-top: 7px !important;">
                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                        <input id="ts1" name="use_secret" type="checkbox" hidden="hidden" {{ $board->use_secret == 1 ? 'checked="checked"' : '' }} value="1">
                                        <label for="ts1" class="ts-helper"></label>
                                    </div>
                                </div>
                                @if ($errors->has('use_secret'))
                                    <span class="help-block">
                                                                                                        {{ $errors->first('use_secret') }}
                                                                                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('use_captcha') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">{{ trans('admin/board.use_captcha') }}</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-slider--b-flat" style="padding-top: 7px !important;">
                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                        <input type="checkbox" value="1"
                                               id="ts2" name="use_captcha" hidden="hidden" {{ $board->use_captcha == 1 ? 'checked="checked"' : '' }}>
                                        <label for="ts2" class="ts-helper"></label>
                                    </div>
                                </div>

                                @if ($errors->has('use_captcha'))
                                    <span class="help-block">
                            {{ $errors->first('use_captcha') }}
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('use_comment') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">{{ trans('admin/board.use_comment') }}</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-slider--b-flat" style="padding-top: 7px !important;">
                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                        <input type="checkbox" value="1"
                                               id="ts3" name="use_comment" {{ $board->use_comment == 1 ? 'checked="checked"' : '' }}>
                                        <label for="ts3" class="ts-helper"></label>
                                    </div>
                                </div>

                                @if ($errors->has('use_comment'))
                                    <span class="help-block">
                            {{ $errors->first('use_comment') }}
                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('use_opinion') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">{{ trans('admin/board.use_opinion') }}</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-slider--b-flat">
                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                        <input type="checkbox" value="1"
                                               id="ts4" name="use_opinion" {{ $board->use_opinion == 1 ? 'checked="checked"' : '' }}>
                                        <label for="ts4" class="ts-helper"></label>
                                    </div>
                                </div>

                                @if ($errors->has('use_opinion'))
                                    <span class="help-block">
                            {{ $errors->first('use_opinion') }}
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('use_tag') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">{{ trans('admin/board.use_tag') }}</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-slider--b-flat">
                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                        <input type="checkbox" value="1"
                                               id="ts5" name="use_tag" {{ $board->use_tag == 1 ? 'checked="checked"' : '' }}>
                                        <label for="ts5" class="ts-helper"></label>
                                    </div>
                                </div>

                                @if ($errors->has('use_tag'))
                                    <span class="help-block">
                            {{ $errors->first('use_tag') }}
                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('use_category') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">{{ trans('admin/board.use_category') }}</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-slider--b-flat">
                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                        <input type="checkbox" value="1"
                                               id="ts6" name="use_category" {{ $board->use_category == 1 ? 'checked="checked"' : '' }}>
                                        <label for="ts6" class="ts-helper"></label>
                                    </div>
                                </div>

                                @if ($errors->has('use_category'))
                                    <span class="help-block">
                            {{ $errors->first('use_category') }}
                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('use_upload') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">{{ trans('admin/board.use_upload') }}</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-slider--b-flat">
                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                        <input type="checkbox" value="1"
                                               id="ts7" name="use_upload" {{ $board->use_upload == 1 ? 'checked="checked"' : '' }}>
                                        <label for="ts7" class="ts-helper"></label>
                                    </div>
                                </div>

                                @if ($errors->has('use_upload'))
                                    <span class="help-block">
                            {{ $errors->first('use_upload') }}
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('use_thumbnail') ? 'has-error' : '' }}">
                            <label for=""
                                   class="control-label col-md-3">{{ trans('admin/board.use_thumbnail') }}</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-slider--b-flat">
                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="blue">
                                        <input type="checkbox" value="1"
                                               id="ts8" name="use_thumbnail" {{ $board->use_thumbnail == 1 ? 'checked="checked"' : '' }}>
                                        <label for="ts8" class="ts-helper"></label>
                                    </div>
                                </div>

                                @if ($errors->has('use_thumbnail'))
                                    <span class="help-block">
                            {{ $errors->first('use_thumbnail') }}
                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('upload_max_filesize') ? 'has-error' : '' }}">
                            <label for="inputUploadMaxFilesize"
                                   class="control-label col-md-3">{{ trans('admin/board.upload_max_filesize') }}</label>
                            <div class="col-md-4">

                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="{{ trans('admin/board.upload_max_filesize') }}"
                                           name="upload_max_filesize" id="inputUploadMaxFilesize"
                                           value="{{ $board->upload_max_filesize or old('upload_max_filesize') }}">
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
                            <label for="inputUploadMaxLimit"
                                   class="control-label col-md-3">{{ trans('admin/board.upload_max_limit') }}</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"
                                       placeholder="{{ trans('admin/board.upload_max_limit') }}" name="upload_max_limit"
                                       id="inputUploadMaxLimit"
                                       value="{{ $board->upload_max_limit or old('upload_max_limit') }}">

                                @if ($errors->has('upload_max_limit'))
                                    <span class="help-block">
                            {{ $errors->first('upload_max_limit') }}
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('status_cd') ? 'has-error' : '' }}">
                            <label for="inputStatusCd"
                                   class="control-label col-md-3">{{ trans('admin/board.status_cd') }}</label>
                            <div class="col-md-4">

                                <div class="btn-group" data-toggle="buttons">
                                    @foreach($status_cd_list as $code)
                                        <label class="btn btn-default {{ $board->status_cd == $code->id ? 'active' : '' }}">
                                            <input type="radio" name="status_cd" autocomplete="off"
                                                   {{ $board->status_cd == $code->id ? 'checked' : '' }} value="{{ $code->id }}"> {{ $code->display() }}
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
                            <label for="input"
                                   class="control-label col-md-3">{{ trans('admin/board.created_at') }}</label>
                            <div class="col-md-4">
                                <p class='form-control-static'>{{ $board->created_at }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input"
                                   class="control-label col-md-3">{{ trans('admin/board.updated_at') }}</label>
                            <div class="col-md-4">
                                <p class='form-control-static'>{{ $board->updated_at or '-' }}</p>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <a href="{{ route('board.index') }}" class="btn btn-default"><i
                                            class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                                <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                        type="submit">{{ trans('common.button.save') }}</button>
                            </div>
                            <button class="btn btn-danger pull-right" id="btn-board-destory" type="button"
                                    data-loading-text="{{ trans('common.button.loading') }}">{{ trans('common.button.destroy') }}</button>
                        </div>

                    </fieldset>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>



    {!! Form::open(['method' => 'DELETE', 'route' => ['board.destroy', $board->id], 'id'=>'frm-board-destroy']) !!}
    {!! Form::close() !!}
@endsection

@push( 'footer-script' )
    <script type="text/javascript">
        $(function () {
            var $frm = $('#frm-board-destroy');
            var $frm_target = $('#frm-board');

            $(document).on("click", '#btn-board-destory', function (e) {

                e.preventDefault();

                if (confirm("해당 게시판을 삭제하시겠습니까?")) {
                    $('#frm-board fieldset').prop("disabled", true);
                    $(this).button('loading');
                    $frm.submit();
                }

            });
        });


    </script>
@endpush
