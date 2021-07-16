<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;

/**
 * This area contains the current price information.
 */
class Price extends AbstractModel
{
    /**
     * This number field must contain a price for each article, based on the packaging unit from the "OrderUnit".
     */
    public float $Purchase;

    /**
     * If it is not possible for the vendor to enter the full price for the packaging unit in the "Purchase", the user
     * has the possibility to enter a factor for the calculation.
     *
     * The price of the packaging unit is then automatically calculated from the price and the price quantity:
     *     Price (Purchase) * Price quantity (Factor) = Price of the packaging unit in the customer system
     *
     * If no price factor is required, please leave the field empty or fill it with 1. In this case please never enter
     * a 0.
     */
    public ?float $Factor = null;

    /**
     * Discount at article level as a decimal
     * number: 100% = 1
     * 10% = 0.1
     * 3% = 0.03
     */
    public ?float $Discount = null;
}