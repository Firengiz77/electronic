
@if ($paginator->hasPages())
<div class="product__pagination blog__pagination">
    @if ($paginator->onFirstPage())
    <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
        <span aria-hidden="true">&lsaquo;</span>
                    </a>
@else
   
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
    
@endif

@foreach ($elements as $element)
{{-- "Three Dots" Separator --}}
@if (is_string($element))
    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
@endif


@if (is_array($element))
@foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
        <a class="active" aria-current="page"><span>{{ $page }}</span></a>
    @else
        <a href="{{ $url }}">{{ $page }}</a>
    @endif
@endforeach
@endif
@endforeach

    @if ($paginator->hasMorePages())
    
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
   
@else
    <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
        <span aria-hidden="true">&rsaquo;</span>
    </a>
@endif

</div>
@endif