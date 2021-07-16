<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;

/**
 * In the "Options" area, it is indicated whether the article can be ordered and whether it is a contract article
 * ...is trading.
 */
class CatalogItemOptions extends AbstractModel
{
    /**
     * Here you can indicate whether the article can be ordered.
     */
    public ?bool $Effective = null;

    /**
     * Indicates whether the article is part of a contract or agreement between supplier and customer.
     *
     * Articles are usually marked as contract articles if they are part of an agreed assortment or if their price has
     * been negotiated and contractually fixed for a period of time.
     */
    public bool $ContractItem;
}