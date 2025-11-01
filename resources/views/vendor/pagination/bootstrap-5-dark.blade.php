<ul class="pagination justify-content-center bg-dark p-2 rounded">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled"><span class="page-link bg-dark text-white"></span></li>
    @else
        <li class="page-item"><a class="page-link bg-dark text-white" href="{{ $paginator->previousPageUrl() }}"
                rel="prev"></a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="page-item disabled"><span class="page-link bg-dark text-white">{{ $element }}</span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link bg-secondary text-white">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link bg-dark text-white" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        li class="page-item"><a class="page-link bg-dark text-white" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
        </li>
    @else
        <li class="page-item disabled"><span class="page-link bg-dark text-white"></span></li>
    @endif
</ul>