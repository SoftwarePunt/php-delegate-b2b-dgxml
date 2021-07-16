<?php

namespace SoftwarePunt\DGXML\Models\Values;

use SoftwarePunt\DGXML\AbstractValueModel;

/**
 * Information codes may be transmitted in this box.
 *
 * These must be agreed upon beforehand between customer and supplier and stored in the additive
 * management as B2B assignment codes.
 *
 * If not all suppliers deliver the same codes, the supplier-specific information codes can be stored in the supplier
 * master data in the delegate system.
 */
class Information extends AbstractValueModel
{
    /**
     * Information codes.
     */
    public ?string $Information = null;

    // -----------------------------------------------------------------------------------------------------------------

    public function getValue(): string
    {
        return $this->Information;
    }

    public function setValue($value)
    {
        $this->Information = $value;
    }
}