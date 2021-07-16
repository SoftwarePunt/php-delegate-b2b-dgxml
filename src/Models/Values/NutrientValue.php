<?php

namespace SoftwarePunt\DGXML\Models\Values;

use SoftwarePunt\DGXML\AbstractValueModel;

/**
 * Here the nutritional values of the article can be transmitted.
 */
class NutrientValue extends AbstractValueModel
{
    /**
     * Nutrient per 100 Gram
     */
    public float $NutrientValue;

    /**
     * The code of the respective nutrition value (e.g. "GCAL").
     */
    public string $code;

    // -----------------------------------------------------------------------------------------------------------------

    public function getValue(): float
    {
        return $this->NutrientValue;
    }

    public function setValue($value)
    {
        $this->NutrientValue = $value;
    }
}