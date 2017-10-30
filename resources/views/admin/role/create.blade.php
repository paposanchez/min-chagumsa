@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.config.role')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::open(['method' => 'POST','route' => ['role.store'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data"]) !!}
                <fieldset>

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-md-3">{{ trans('admin/role.name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/role.name') }}"
                                   name="name" id="inputName" value="{{ $role->name or old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
                        <label for="inputDisplayName"
                               class="control-label col-md-3">{{ trans('admin/role.display_name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/role.display_name') }}"
                                   name="display_name" id="inputDisplayName"
                                   value="{{ $role->display_name or old('display_name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                            {{ $errors->first('display_name') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label for="inputdescription"
                               class="control-label col-md-3">{{ trans('admin/role.description') }}</label>
                        <div class="col-md-6">
                            <textarea rows="5" class="form-control" placeholder="{{ trans('admin/role.description') }}"
                                      name="description" id="inputdescription">{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                            {{ $errors->first('description') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
                        <label for="inputPermission"
                               class="control-label col-md-3">{{ trans('admin/role.permission') }}</label>
                        <div class="col-md-6">

                            {!! Form::select('permission[]', $permissions->pluck("name","id"), [], ['class'=>'form-control', 'multiple', 'id'=>'role-permission']) !!}

                            @if ($errors->has('permission'))
                                <span class="help-block">
                            {{ $errors->first('permission') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ route('role.index') }}" class="btn btn-default"><i
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

@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection

