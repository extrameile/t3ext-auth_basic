<?php
declare(strict_types=1);

namespace Extrameile\AuthBasic\Hooks;

use TYPO3\CMS\Backend\Utility\BackendUtility;

class PageTreeUpdateSignal
{
    public function processDatamap_afterDatabaseOperations($status, $table, $id, $fieldArray, $parentObject)
    {
        if ($table === 'pages'&& isset($fieldArray['authbasic_active'])) {
            BackendUtility::setUpdateSignal('updatePageTree');
        }
    }
}