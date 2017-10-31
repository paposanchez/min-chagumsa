@if ($entrys->lastPage() > 1)
<ul class="pagination">
        <li class="{{ ($entrys->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $entrys->url(1) }}"><i class="icon-angle-double-left"></i></a>
        </li>
        @for ($i = 1; $i <= $entrys->lastPage(); $i++)
                <?php
                $half_total_links = floor(10 / 2);
                $from = $entrys->currentPage() - $half_total_links;
                $to = $entrys->currentPage() + $half_total_links;
                if ($entrys->currentPage() < $half_total_links) {
                        $to += $half_total_links - $entrys->currentPage();
                }
                if ($entrys->lastPage() - $entrys->currentPage() < $half_total_links) {
                        $from -= $half_total_links - ($entrys->lastPage() - $entrys->currentPage()) - 1;
                }
                ?>
                @if ($from < $i && $i < $to)

                        @if($entrys->currentPage() == $i)
                        <li class="active">
                                <span>{{ $i }}</span>
                        </li>
                        @else
                        <li class="">
                                <a href="{{ $entrys->url($i) }}">{{ $i }}</a>
                        </li>
                        @endif

                @endif
        @endfor

        <li class="{{ ($entrys->currentPage() == $entrys->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $entrys->url($entrys->lastPage()) }}"><i class="icon-angle-double-right"></i></a>
        </li>
</ul>
@endif
