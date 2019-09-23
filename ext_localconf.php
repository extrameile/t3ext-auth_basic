<?php

$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] = ',authbasic_active,authbasic,';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][\TYPO3\CMS\Core\Imaging\IconFactory::class]['overrideIconOverlay'][] = \AndreasKiessling\AuthBasic\Hooks\IconOverlay::class;

// override the repository to fetch additional fields - see https://forge.typo3.org/issues/88300
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Backend\Tree\Repository\PageTreeRepository::class] = [
    'className' => \AndreasKiessling\AuthBasic\Repository\PageTreeRepository::class
];
