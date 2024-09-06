<style>
    ul {
        display: flex; 
        color:white;
    }
    li {
        list-style: none;
        margin-right: 10px; 
        color:white;   
        font-family: "Jost"; 
        font-size:17px;
    }
    a {
        color:rgb(110, 110, 110);
        text-decoration: none;
    }
    span {
        color:white;
    }
    .disabled {
        color:white;
    }
    body.dark-mode {
        span {
            color:black;
    }
    .disabled {
        color:black;
    }
    }

</style>
@if ($paginator->hasPages())
    <nav style="display:flex; justify-content:center;">
        <ul class="pagination" style="">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"  aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" style="color:white;" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" style="color:rgb(255, 255, 255);" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" style="margin-right:40px" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
