<?php

return [
    'autoload' => __DIR__
    'namespace' => 'Javanile\\DocForge',
    'pages' => [
        'index' => 'Page',
        'page1' => [
            'index' => 'Page',
            'page2' => 'Page',
            'page3' => 'Page'
        ]
    ]
    'docs' => [
        'classes' => 'src/**/*.php'
    ],
    'output' => 'docs'
];
