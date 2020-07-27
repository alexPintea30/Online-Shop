@if ($paginator->hasPages())

    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" >
                    <span  class="page-link" aria-hidden="true" style="background-color: rgba(255, 255, 255, 0.5); color: rgba(30, 30, 30, 0.5);">&laquo;</span>
                </li>
            @else
                <li class="page-item " >
                    <a  class="page-link" href="{{ $paginator->previousPageUrl() }}" style="background-color: rgba(255, 255, 255, 0.5);color:rgba(30, 30, 30, 0.5);" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span style="background-color: rgba(255, 255, 255, 0.5);color:rgba(30, 30, 30, 0.5);" class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"  aria-current="page" ><span class="page-link" style="background-color: rgba(30, 30, 30, 0.5)">{{ $page }}</span></li>
                        @else
                            <li  class="page-item"><a class="page-link" style="background-color: rgba(255, 255, 255, 0.5);color:rgba(30, 30, 30, 0.5);" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a style="background-color: rgba(255, 255, 255, 0.5);color:rgba(30, 30, 30, 0.5)" class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span style="background-color: rgba(255, 255, 255, 0.5);color:rgba(30, 30, 30, 0.5)" class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
