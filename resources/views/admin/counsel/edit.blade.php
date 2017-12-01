@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.post')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                {!! Form::model($counsel, ['method' => 'PATCH','route' => ['counsel.update', $counsel->id], 'class'=>'form-horizontal', 'id'=>'counsel-frm', 'enctype'=>"multipart/form-data"]) !!}
                <fieldset>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="inputContent"
                               class="control-label col-md-3">문의내용</label>
                        <div class="col-md-9">
                            <textarea class="form-control" placeholder="{{ trans('admin/post.content') }}" name="content"
                                      id="inputContent"
                                      style="height: 250px;" disabled>{{ nl2br($counsel->content) }}</textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                        {{ $errors->first('content') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('reply') ? 'has-error' : '' }}">
                        <label for="inputReply"
                               class="control-label col-md-3">답변내용</label>
                        <div class="col-md-9">
                            <textarea class="form-control" placeholder="답변보낼 내용을 적어주세요." name="reply"
                                      id="inputReply"
                                      style="height: 250px;">{{ nl2br($counsel->reply) }}</textarea>
                            @if ($errors->has('reply'))
                                <span class="help-block">
                                        {{ $errors->first('reply') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-3">{{ trans('admin/post.name') }}</label>
                        <div class="col-md-4">
                            <p class="form-control-static">{{ $counsel->name }}</p>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-md-3">{{ trans('admin/post.email') }}</label>
                        <div class="col-md-4">
                            <p class="form-control-static">{{ $counsel->email }}</p>
                        </div>
                    </div>


                    <div class="form-group ">
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.created_at') }}</label>

                        <div class="col-md-9">
                            <div class="input-group">
                                <p class="form-control-static" name="created_at">{{ $counsel->created_at }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="form-group ">
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.updated_at') }}</label>

                        <div class="col-md-9">
                            <div class="input-group">
                                <p class="form-control-static" name="updated_at">{{ $counsel->updated_at ? $counsel->updated_at : '-'}}</p>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <a href="{{ route('counsel.index') }}" class="btn btn-default"><i
                                        class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                            <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                    type="submit">이메일 전송</button>
                        </div>
                    </div>

                </fieldset>
                {!! Form::close() !!}

            </div>
        </div>

    </div><!-- container -->
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
@endpush
