<?php

declare(strict_types=1);

namespace Extrameile\AuthBasic\Repository;

class PageTreeRepository extends \TYPO3\CMS\Backend\Tree\Repository\PageTreeRepository
{
    /**
     * Append an additional field to the queried pages,
     * otherwise expensive lookups on every page record would be required
     * @inheritDoc
     */
    public function __construct(
        int $workspaceId = 0,
        array $additionalFieldsToQuery = [],
        array $additionalQueryRestrictions = []
    ) {
        $this->fields[] = 'authbasic_active';
        parent::__construct($workspaceId, $additionalFieldsToQuery, $additionalQueryRestrictions);
    }
}
