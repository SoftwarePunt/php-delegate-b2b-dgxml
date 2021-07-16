<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;

class ProductCatalog extends AbstractModel
{
    /**
     * The catalog header, which contains general information about the document, supplier and buyer.
     */
    public CatalogHeader $Header;

    /**
     * The "Items" area contains the items offered by the supplier
     *
     * @var CatalogItem[]
     */
    public array $Items = [];

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        $this->Header = new CatalogHeader();
    }
}
