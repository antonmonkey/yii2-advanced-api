<?php
return [
    'manageProfile' => [
        'type' => 2,
        'ruleName' => 'profileOwner',
    ],
    'manageProduct' => [
        'type' => 2,
        'ruleName' => 'productsAuthor',
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'manageProfile',
            'manageProduct',
        ],
    ],
];
