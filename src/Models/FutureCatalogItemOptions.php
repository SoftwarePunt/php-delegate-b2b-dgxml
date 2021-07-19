<?php

namespace SoftwarePunt\DGXML\Models;

/**
 * Future item options with effective date.
 */
class FutureCatalogItemOptions extends CatalogItemOptions
{
    /**
     * Indication of the date on which the price becomes valid (in YYYY-MM-DD format).
     */
    public ?\DateTime $ValidFrom = null;

    // -----------------------------------------------------------------------------------------------------------------

    public function getElementName(): string
    {
        return "Options";
    }
}