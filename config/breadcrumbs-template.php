<?php

// Template breadcrumbs-template.php
/* My template for breadcrumbs
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item text-muted">
            <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Dashboards</li>
        <li class="breadcrumb-item text-dark">Default</li>
    </ul>
*/

// CakePHP template for breadcrumbs
/*
[
    'wrapper' => '<ul{{attrs}}>{{content}}</ul>',
    'item' => '<li{{attrs}}><a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}',
    'itemWithoutLink' => '<li{{attrs}}><span{{innerAttrs}}>{{title}}</span></li>{{separator}}',
    'separator' => '<li{{attrs}}><span{{innerAttrs}}>{{separator}}</span></li>'
]
*/

// Implementation
return [
    'wrapper' => '<ul class="breadcrumb fw-bold fs-base my-1">{{content}}</ul>',
    'item' => '<li{{attrs}}><a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}',
    'itemWithoutLink' => '<li{{attrs}}><span{{innerAttrs}}>{{title}}</span></li>{{separator}}',
    'separator' => '<li{{attrs}}><span{{innerAttrs}}>{{separator}}</span></li>'
];
