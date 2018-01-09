@if ($breadcrumbs)
    <div class="page-title">
        <div class="container-fluid">
            <h2>
                @foreach ($breadcrumbs as $breadcrumb)
                    <span class="divider">/</span>
                    <span><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></span>
                @endforeach
            </h2>

            @if(isset($breadcrumb->desc) && $breadcrumb->desc)
                <p class="desc">{{ $breadcrumb->desc }}</p>
            @endif
        </div>
    </div>
@endif
