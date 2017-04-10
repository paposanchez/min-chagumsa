@if ($breadcrumbs)
<div class="page-title">
    <div class="container">
        <h2>    
            @foreach ($breadcrumbs as $breadcrumb)

            @if (!$breadcrumb->last)

            @if (!$breadcrumb->first)
            <span class="divider">/</span>
            @endif

            <span><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></span>

            @else

            @if (!$breadcrumb->first)
            <span class="divider">/</span>
            @endif

            <span class="active">{{ $breadcrumb->title }}</span>

            @endif

            @endforeach
        </h2>

        @if(isset($breadcrumb->desc) && $breadcrumb->desc)
        <p class="desc">{{ $breadcrumb->desc }}</p>
        @endif
    </div>
</div>
@endif
