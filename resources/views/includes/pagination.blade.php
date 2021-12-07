@if ($paginator->hasPages())
    @if ($paginator->lastPage() > 1)
        <ul class="clearfix">
            @if (!$paginator->onFirstPage())
            <li class="prev"><a href="{{ $paginator->url($paginator->currentPage() - 1) }}"><span
                        class="fa fa-angle-left"></span></a>
            </li>
            @endif
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                @if ($paginator->currentPage() == $i)
                    <li><a href="#" class="active">{{ $i }}</a></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor
            @if ($paginator->currentPage() != $paginator->lastPage())
                <li class="next"><a href="{{ $paginator->url($paginator->currentPage() + 1) }}"><span
                            class="fa fa-angle-right"></span></a></li>
            @endif

        </ul>
    @endif
@endif
