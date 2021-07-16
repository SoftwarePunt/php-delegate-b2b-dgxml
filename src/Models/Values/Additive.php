<?php

namespace SoftwarePunt\DGXML\Models\Values;

use SoftwarePunt\DGXML\AbstractValueModel;

/**
 * Information concerning the additives contained in the article can be submitted here.
 */
class Additive extends AbstractValueModel
{
    /**
     * Additive codes can be transmitted in this field.
     *
     * These must first be agreed between the customer and the supplier and stored in Additive Management as B2B
     * assignment codes. If not all suppliers deliver the same codes, the supplier-specific additive codes can be
     * stored in the supplier master data in the delegate system.
     */
    public ?float $Additive = null;

    /**
     * Additives, of which traces may be contained in the article, must be defined with contained="CANCONTAIN" in
     * <Additives> tag can be marked, e.g: <Additives contained="CANCONTAIN"> E333 </Additives>
     */
    public string $contained;

    // -----------------------------------------------------------------------------------------------------------------

    public function getValue()
    {
        return $this->Additive;
    }

    public function setValue($value)
    {
        $this->Additive = $value;
    }
}