@if ($paginator->hasPages())
<div class="row">
  <div class="col-sm-12 col-md-5">
    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
      Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
    </div>
  </div>
  <div class="col-sm-12 col-md-7">
    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
      <ul class="pagination">
        {{-- Previous Page Button --}}
        @if ($paginator->onFirstPage())
        <li class="paginate_button page-item previous disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
          <span class="page-link" aria-hidden="true">Previous</span>
        </li>
        @else
        <li class="paginate_button page-item previous">
          <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="page-link">
            Previous
          </button>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="paginate_button page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="paginate_button page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
        @else
        <li class="paginate_button page-item">
          <button wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled" class="page-link">
            {{ $page }}
          </button>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Button --}}
        @if ($paginator->hasMorePages())
        <li class="paginate_button page-item next">
          <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="page-link">
            Next
          </button>
        </li>
        @else
        <li class="paginate_button page-item next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
          <span class="page-link" aria-hidden="true">Next</span>
        </li>
        @endif
      </ul>
    </div>
  </div>

</div>
@endif
