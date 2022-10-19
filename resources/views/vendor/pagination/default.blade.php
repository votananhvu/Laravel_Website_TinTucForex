@if ($paginator->hasPages())
<style>
.pagination-custom {
    list-style: none;
    display: inline-block;
    padding: 0;
    margin-top: 10px;
}

.pagination-custom li {
    display: inline;
    text-align: center;
}

.pagination-custom a {
    float: left;
    display: block;
    font-size: 14px;
    text-decoration: none;
    padding: 5px 12px;
    color: #fff;
    margin-left: -1px;
    border: 1px solid transparent;
    line-height: 1.5;
}

.pagination-custom a.active {
    cursor: default;
}

.pagination-custom a:active {
    outline: none;
}

.modal-1 li:first-child a {
    -moz-border-radius: 6px 0 0 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px 0 0 6px;
}

.modal-1 li:last-child a {
    -moz-border-radius: 0 6px 6px 0;
    -webkit-border-radius: 0;
    border-radius: 0 6px 6px 0;
}

.modal-1 a {
    border-color: #ddd;
    color: #4285F4;
    background: #fff;
}

.modal-1 a:hover {
    background: #eee;
}

.modal-1 a.active,
.modal-1 a:active {
    border-color: #4285F4;
    background: #4285F4;
    color: #fff;
}
</style>

<ul class="pagination-custom modal-1" style="margin-top:50px;">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li aria-disabled="true" aria-label="@lang('pagination.previous')">
        <a class="prev" aria-hidden="true">&lsaquo;</a>
    </li>
    @else
    <li>
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li aria-current="page"><a class="active">{{ $page }}</a></li>
    @else
    <li><a href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li>
        <a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next"
            aria-label="@lang('pagination.next')">&raquo;</a>
    </li>
    @else
    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
        <a class="next" aria-hidden="true">&raquo;</a>
    </li>
    @endif
</ul>

@endif