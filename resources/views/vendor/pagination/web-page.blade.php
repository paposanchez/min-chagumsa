<ul>
    @if ($paginator->onFirstPage())
    <li><a href='#'><i class="fa fa-angle-double-left"></i></a></li>
    @else
    <li><a href='{{ $paginator->previousPageUrl() }}'><i class="fa fa-angle-double-left"></i></a></li>
    @endif

    @if ($paginator->hasPages())
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if ($i == $paginator->currentPage())
                <li><a href='#' class='select'>{{ $i }}</a></li>
            @else
                <li><a href='{{ $paginator->url($i) }}'>{{ $i }}</a></li>
            @endif
        @endfor
    @else
            <li><a href='' class='select'>1</a></li>
    @endif

    @if ($paginator->hasMorePages())
        <li><a href='{{ $paginator->nextPageUrl() }}'><i class="fa fa-angle-double-right"></i></a></li>
    @else
        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
    @endif
</ul>