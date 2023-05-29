<?php

return [
    'nextActive' => '<li class="next page-item"><a rel="next" href="{{url}}" class="page-link">{{text}}</a></li>',
    'nextDisabled' => '<li class="next page-item disabled"><a href="" onclick="return false;" class="page-link">{{text}}</a></li>',
    'prevActive' => '<li class="prev page-item"><a rel="prev" href="{{url}}" class="page-link">{{text}}</a></li>',
    'prevDisabled' => '<li class="prev disabled page-item"><a href="" onclick="return false;" class="page-link">{{text}}</a></li>',
    'counterRange' => '{{start}} - {{end}} of {{count}}',
    'counterPages' => '{{page}} of {{pages}}',
    'first' => '<li class="first page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'last' => '<li class="last page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'current' => '<li class="active page-item"><a href="" class="page-link">{{text}}</a></li>',
    'ellipsis' => '<li class="ellipsis">&hellip;</li>',
    'sort' => '<th><a href="{{url}}">{{text}}</a></th>',
    'sortAsc' => '<th><a class="asc min-w-125px" href="{{url}}">{{text}}</a></th>',
    'sortDesc' => '<th><a class="desc" href="{{url}}">{{text}}</a></th>',
    'sortAscLocked' => '<th><a class="asc locked" href="{{url}}">{{text}}</a></th>',
    'sortDescLocked' => '<th><a class="desc locked" href="{{url}}">{{text}}</a></th>',
];
