<?php

$tempColumns = [
    'authbasic_active' => [
        'exclude' => true,
        'label' => 'LLL:EXT:auth_basic/Resources/Private/Language/locallang_db.xlf:tx_authbasic_domain_model_page.authbasic_active',
        'onChange' => 'reload',
        'config' => [
            'type' => 'check',
        ]
    ],
    'authbasic' => [
        'exclude' => true,
        'label' => 'LLL:EXT:auth_basic/Resources/Private/Language/locallang_db.xlf:tx_authbasic_domain_model_page.authbasic',
        'displayCond' => 'FIELD:authbasic_active:=:1',
        'config' => [
            'type' => 'text',
            'eval' => 'trim',
        ]
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', 'authbasic_active, authbasic', '', 'after:editlock');

