<ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled"><span class="fa fa-angle-left"></span></li>
        @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span class="fa fa-angle-left"></span></a></li>
        @endif

        @if ($paginator->hasPages())
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                                @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                        <li class="active"><span>{{ $page }}</span></li>
                                        @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                @endforeach
                        @endif
                @endforeach
        @else
                <li class="disabled active"><span>1</span></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><span class="fa fa-angle-right"></span></a></li>
        @else
        <li class="disabled"><span class="fa fa-angle-right"></span></li>
        @endif
</ul>
