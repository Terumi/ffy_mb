<?php
    $start_item_index = ($paginator->currentPage() - 1) * $paginator->perPage();
    $end_item_index = $start_item_index + $paginator->count();
?>

<span class="text-muted"><b>{{ $start_item_index }}</b>–<b>{{ $end_item_index   }}</b> of <b>{{$paginator->total()}}</b></span>
    <div class="btn-group btn-group-sm ml5">
        <a href="{{ $paginator->url($paginator->currentPage()-1) }}" type="button"
           class="btn btn-default {{$paginator->currentPage() ==1? 'disabled' : ''}}">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" type="button"
           class="btn btn-default {{$paginator->currentPage() == $paginator->lastPage()? 'disabled' : ''}}">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
