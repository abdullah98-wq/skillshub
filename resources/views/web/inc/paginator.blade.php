
@if ($paginator->haspages())


   <!-- pagination -->
   <div class="col-md-12">
    <div class="post-pagination">
        @if ($paginator->onFirstPage())
        <a href="#" class=" btn diasbled pagination-back pull-left">Back</a>
        @else
        <a href="{{$paginator->previousPageUrl()}}" class="pagination-back pull-left">Back</a>
          @endif
        <ul class="pages">
            @foreach ($elements as $element)
            @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="active">{{$page}}</li>
                        @else
                        <li><a href="{{$url}}">{{$page}}</a></li>
                        @endif
                    @endforeach
                @endif
                @endforeach

        </ul>
        @if ($paginator->hasMorePages())
        <a href="{{$paginator->nextPageUrl()}}" class="pagination-next pull-right">next</a>
        @else
        <a href="#" class=" btn disabled pagination-next pull-right">next</a>
        @endif

    </div>
</div>
<!-- pagination -->
@endif
