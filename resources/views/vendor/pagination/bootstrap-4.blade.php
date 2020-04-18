<div class="row">
    <div class="col-md-12">
        <div class="pagination-area">
            <nav class="navigation pagination" role="navigation">
                <div class="nav-links " >
                    @if (!$paginator->onFirstPage())

                                    <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}">
                                        <span class="lnr lnr-arrow-left"></span>
                                    </a>
                    @else
                    <a class="prev page-numbers"  aria-disabled="true">
                        <span class="lnr lnr-arrow-left"></span>
                    </a>
                    @endif
                    @foreach ($elements as $element)
                        @if (is_string($element))
                        <a class="page-item disabled" aria-disabled="true">
                        <span class="pink">{{ $element }}</span></a>
                        @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                            <a class="page-numbers current" href="#"> {{ $page }} </a>
                            @else
                            <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                     @endif
                     @endforeach
    
                @if ($paginator->hasMorePages())
                                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next">
                                    <span class="lnr lnr-arrow-right"></span>
                                </a>
                @else
                                <a class="next page-numbers"  aria-disabled="true">
                                    <span class="lnr lnr-arrow-right"></span>
                                </a>
                @endif
                </div>
            </nav>
        </div>
    </div>
</div>
