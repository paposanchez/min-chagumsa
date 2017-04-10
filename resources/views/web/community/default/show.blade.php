@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.community.'.$board_namespace)])
@endsection

@section( 'content' )
<div class="container">

    <div class="row">

        <div class="col-md-3 hidden-sm hidden-xs">
            @include( 'web.partials.submenu.community' )
        </div>

        <div class="col-md-9">


            <div class="post">

                <h3 class="subject">{{ $data->subject }}</h3>

                <div class="post-info">
                    <small>{{ trans("web/post.hit_view") }} <span class='text-danger'>{{ number_format($data->hit) }}</span></small>
                    <small>{{ trans("web/post.date_view") }} <span class='text-danger'>{{ $data->created_at->format('Y-m-d H:i:s') }}</span></small>
                </div>


                <div class="content">
                    {!! $data->content  !!}
                </div>


                @if(count($data->files) > 0)
                <div class="files">
                    <!--<h4 class="toggle-files">{{ trans("web/post.uploaded_files") }}</h4>-->
                    <div class="file-list">
                        @foreach($data->files as $file)
                        <a href="/file/download/{{ $file->id }}" class="file">{{ $file->original }}

                            <span class="info">{{ Helper::formatBytes($file->size) }} / {{ trans("web/post.download_view", ["count"=>number_format($file->download)]) }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif




                <div class="post-controller">
                    <a href="{{ route($board_namespace.'.index') }}" class="btn btn-default"><i class="fa fa-list"></i> {{ trans("common.button.list") }}</a>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection
