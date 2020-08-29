<?php

declare(strict_types=1);

namespace Extrameile\AuthBasic\Hooks;

class IconOverlay
{

    /**
     * @param string $table
     * @param array $row
     * @param array $status
     * @param string $iconName
     * @return string
     *
     * @SuppressWarnings("unused")
     */
    public function postOverlayPriorityLookup(string $table, array $row, array $status, string $iconName)
    {
        if (
            $table === 'pages'
            && (int)$row['authbasic_active'] === 1
        ) {
            return 'overlay-locked';
        }

        return $iconName;
    }
}
