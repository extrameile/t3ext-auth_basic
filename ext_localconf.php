<?php

$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] = ',authbasic_active,authbasic,';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][\TYPO3\CMS\Core\Imaging\IconFactory::class]['overrideIconOverlay'][] = \Extrameile\AuthBasic\Hooks\IconOverlay::class;

// override the repository to fetch additional fields - see https://forge.typo3.org/issues/88300
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Backend\Tree\Repository\PageTreeRepository::class] = [
    'className' => \Extrameile\AuthBasic\Repository\PageTreeRepository::class
];


$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \Extrameile\AuthBasic\Hooks\PageTreeUpdateSignal::class;
