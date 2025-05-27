@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- попередня сторінка --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">«</span></li>
        @else
            <li class="page-item">
                <a class="page-link"
                   href="{{ str_replace('http://', 'https://', $paginator->previousPageUrl()) }}">
                    «
                </a>
            </li>
        @endif

        {{-- кнопки сторінок --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ str_replace('http://', 'https://', $url) }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- наступна сторінка --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link"
                   href="{{ str_replace('http://', 'https://', $paginator->nextPageUrl()) }}">
                    »
                </a>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">»</span></li>
        @endif
    </ul>
@endif
