<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;

class CatalogHeader extends AbstractModel
{
    /**
     * The "Document" section contains general information about the catalog.
     */
    public Document $Document;

    /**
     * The "Supplier" section contains information on the supplier.
     */
    public Supplier $Supplier;

    /**
     * This is an optional area for identifying the buyer
     */
    public ?Buyer $Buyer = null;

    /**
     * The time at which the catalog was created or transmitted can be entered here.
     */
    public ?\DateTime $SendDateTime = null;

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        $this->Document = new Document();
        $this->Supplier = new Supplier();
        $this->SendDateTime = new \DateTime('now');
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getElementName(): string
    {
        return "Header";
    }
}