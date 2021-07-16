<?php

namespace SoftwarePunt\DGXML\Models\Values;

use SoftwarePunt\DGXML\AbstractValueModel;

/**
 * Additional taxes or fees levied on the article.
 */
class TaxFee extends AbstractValueModel
{
    /**
     * Additional taxes or fees levied on the article.
     */
    public ?float $TaxFee = null;

    // -----------------------------------------------------------------------------------------------------------------

    public function getValue(): ?float
    {
        return $this->TaxFee;
    }

    public function setValue($value)
    {
        $this->TaxFee = $value;
    }
}