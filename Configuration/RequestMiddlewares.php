<?php

return [
    'frontend' => [
        'andreaskiessling/authbasic/authbasic' => [
            'target' => \AndreasKiessling\AuthBasic\Middleware\AuthBasic::class,
            'after' => [
                'typo3/cms-frontend/page-resolver',
            ],
        ],
    ],
];
