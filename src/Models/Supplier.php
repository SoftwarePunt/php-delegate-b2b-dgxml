<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;

/**
 * The "Supplier" section contains information on the supplier
 */
class Supplier extends AbstractModel
{
    /**
     * Number identifying the supplier; usually his GLN (Global Location Number).
     */
    public int $GLN;

    /**
     * The name of the supplier.
     *
     * If you work with different price lists or distribution warehouses, it makes sense to use the name of the
     * catalog publisher here.
     */
    public string $Name;

    /**
     * For future use: The vendor's VAT identification number.
     */
    public ?string $VATID = null;

    /**
     * For Future Use: This number field is either filled with 1 for a complete catalog or 0 for a delta catalog.
     *
     * Important! There are several features in Delegate system that assume that all orderable articles of a supplier
     * are included in the catalog. This is why a complete catalogue is preferred for Delegate customers.
     *
     * Delta Catalogs contain only the articles that:
     *  - were changed (e.g., new price),
     *  - were added or
     *  - are not available anymore.
     */
    public ?bool $DeltaCatalog = null;
}