<div>
    <div class="card-tools">
        @if ($paginator->hasPages())
            <ul class="pagination">
                <ul class="pagination pagination-sm m-0 float-right">
                    @if ($paginator->onFirstPage())
                        <li wire:click="previousPage" class="page-item "><a href="#" class="page-link">&laquo;</a></li>
                    @else
                        <li wire:click="previousPage"><a href="#"  class="page-link">&laquo;</a></li>

                    @endif

                    @foreach ($elements as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li  wire:click="gotoPage({{$page}})" class="page-item"><a href="#" class="page-link">{{$page}} </a></li>
                                @else
                                    <li wire:click="gotoPage({{$page}})" class="page-item"><a href="#" class="page-link">{{$page}}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li wire:click="nextPage"><a href="#"  class="page-link">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><a href="#" class="page-link">&raquo;</a></li>
                    @endif
                </ul>
            </ul>
        @endif
    </div>
</div>
