@if ($paginator->lastPage() > 1)
<div class="ui pagination menu right floated">
    @if ($paginator->currentPage() != 1 && $paginator->lastPage() >= 5) 
        <a class="item" href="{{ $paginator->url(1) }}" >
            <i class="angle double left icon"></i>
        </a>
    @endif
    <{!! $paginator->currentPage() == 1 ? 'div' : 'a' !!} class="{{ $paginator->currentPage() == 1 ? ' disabled item' : 'item' }}" href="{{ $paginator->url($paginator->currentPage()-1) }}">
        <i class="angle left icon"></i>
    </{!! $paginator->currentPage() == 1 ? 'div' : 'a' !!}>

    @for($i = max($paginator->currentPage()-2, 1); $i <= min(max($paginator->currentPage()-2, 1)+5, $paginator->lastPage()); $i++)
        <a class="{{ $paginator->currentPage() == $i ? ' active item' : ' item' }}" href="{{ $paginator->url($i) }}">
            <span>{{ $i }}</span>
        </a>
    @endfor
    <{!! $paginator->currentPage() == $paginator->lastPage() ? 'div' : 'a' !!} class="{!! $paginator->currentPage() == $paginator->lastPage() ? 'disabled item' : 'item' !!}" href="{{ $paginator->url($paginator->currentPage()+1) }}">
        <i class="angle right icon"></i>
    </{!! $paginator->currentPage() == $paginator->lastPage() ? 'div' : 'a' !!}>

    @if ($paginator->currentPage() != $paginator->lastPage() && $paginator->lastPage() >= 5)
        <a class="item" href="{{ $paginator->url($paginator->lastPage()) }}" >
            <i class="angle double right icon"></i>
        </a>
    @endif
</div>
@endif