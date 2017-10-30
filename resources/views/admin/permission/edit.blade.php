@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.config.permission')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::model($permission, ['method' => 'PATCH','route' => ['permission.update', $permission->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
                <fieldset>

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName"
                               class="control-label col-md-3">{{ trans('admin/permission.name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/permission.name') }}"
                                   disabled="true" id="inputName" value="{{ $permission->name or old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
                        <label for="inputDisplayName"
                               class="control-label col-md-3">{{ trans('admin/permission.display_name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                   placeholder="{{ trans('admin/permission.display_name') }}" name="display_name"
                                   id="inputDisplayName" value="{{ $permission->display_name or old('display_name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                            {{ $errors->first('display_name') }}
                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label for="inputdescription"
                               class="control-label col-md-3">{{ trans('admin/permission.description') }}</label>
                        <div class="col-md-6">
                            <textarea rows="5" class="form-control"
                                      placeholder="{{ trans('admin/permission.description') }}" name="description"
                                      id="inputdescription">{{ $permission->description or old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                            {{ $errors->first('description') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                        <label for="inputRolePermission"
                               class="control-label col-md-3">{{ trans('admin/permission.role') }}</label>
                        <div class="col-md-6">

                            {!! Form::select('role[]', $permissions->pluck("name","id"), $rolePermissions, ['class'=>'form-control', 'multiple', 'id'=>'role-permission']) !!}

                            @if ($errors->has('role'))
                                <span class="help-block">
                            {{ $errors->first('role') }}
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input"
                               class="control-label col-md-3">{{ trans('admin/permission.created_at') }}</label>
                        <div class="col-md-4">
                            <p class='form-control-static'>{{ $permission->created_at }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input"
                               class="control-label col-md-3">{{ trans('admin/permission.updated_at') }}</label>
                        <div class="col-md-4">
                            <p class='form-control-static'>{{ $permission->updated_at }}</p>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ route('permission.index') }}" class="btn btn-default"><i
                                        class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                            <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                    type="submit">{{ trans('common.button.save') }}</button>
                            <button class="btn btn-danger pull-right" id="btn-user-destory"
                                    data-loading-text="{{ trans('common.button.loading') }}">{{ trans('common.button.destroy') }}</button>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}

            </div>

        </div>

    </div><!-- container -->

    {!! Form::open(['method' => 'DELETE', 'route' => ['role.destroy', $permission->id], 'id'=>'frm-role-destroy']) !!}
    {!! Form::close() !!}
@endsection

@section( 'footer-script' )
    <script type="text/javascript">
        $(function () {
            var $frm = $('#frm-role-destroy');
            var $frm_target = $('#frm-role');

            $(document).on("click", '#btn-user-destory', function (e) {

                e.preventDefault();

                if (confirm("{{ trans('admin/permission.destroy-warning') }}")) {
                    $('#frm-user fieldset').prop("disabled", true);
                    $(this).button('loading');
                    $frm.submit();
                }

            });
        });


    </script>
@endsection
