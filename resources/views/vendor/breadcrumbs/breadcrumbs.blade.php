@if ($breadcrumbs)
<section class="block bg-primary dark">
    <div class="container container">
        <div class="padding-vertical-large">
            <h1 class="text-lighter">
                @foreach ($breadcrumbs as $breadcrumb)
                @if (!$breadcrumb->last)
                <span class="divider">/</span>
                <span><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></span>
                @else
                <span class="active">{{ $breadcrumb->title }}</span>
                @endif
                @endforeach                
            </h1>
            <p class="text-light text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
</section>
@endif
