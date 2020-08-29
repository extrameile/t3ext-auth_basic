<?php

return [
    'frontend' => [
        'extrameile/authbasic/authbasic' => [
            'target' => \Extrameile\AuthBasic\Middleware\AuthBasic::class,
            'after' => [
                'typo3/cms-frontend/page-resolver',
            ],
        ],
    ],
];
