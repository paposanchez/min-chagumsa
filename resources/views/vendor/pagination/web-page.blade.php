


<ul>
    @if ($paginator->onFirstPage())
    <li><a href='#'><i class="fa fa-angle-double-left"></i></a></li>
    @else
    <li><a href='{{ $paginator->previousPageUrl() }}'><i class="fa fa-angle-double-left"></i></a></li>
    @endif

    @if ($paginator->hasPages())
        @foreach ($elements as $element)
            @if ($page == $paginator->currentPage())
                <li><a href='#' class='select'>{{ $page }}</a></li>
            @else:
                <li><a href='{{ $url }}'>2</a></li>
            @endif
        @endforeach
    @else
            <li><a href='' class='select'>1</a></li>
    @endif

    @if ($paginator->hasMorePages())
        <li><a href='{{ $paginator->nextPageUrl() }}'><i class="fa fa-angle-double-right"></i></a></li>
    @else
        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
    @endif
</ul>