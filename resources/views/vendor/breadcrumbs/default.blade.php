@if ($breadcrumbs)
<ol class="breadcrumb">

        @foreach ($breadcrumbs as $breadcrumb)

        @if (!$breadcrumb->last)

        @if (!$breadcrumb->first)
        <!-- <span class="divider">/</span> -->
        @endif

        <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>

        @else

        @if (!$breadcrumb->first)
        <!-- <span class="divider">/</span> -->
        @endif

        <li class="active">{{ $breadcrumb->title }}</li>

        @endif

        @endforeach
</ol>
@endif
