<?php

namespace SoftwarePunt\DGXML\Models\Values;

use SoftwarePunt\DGXML\AbstractValueModel;

/**
 * Here information can be transmitted regarding the allergens the article contains.
 */
class Allergen extends AbstractValueModel
{
    /**
     * Allergen codes can be transmitted in this field. We recommend that you use the standard codes for the 14
     * allergens defined in the Food Information Ordinance.
     */
    public ?string $Allergen = null;

    /**
     * Allergens, of which traces may be contained in the article, must be identified with contained="CANCONTAIN" in
     * <Allergen> tag can be marked, for example <Allergen contained="CANCONTAIN">AE</allergenic>
     */
    public string $contained;

    // -----------------------------------------------------------------------------------------------------------------

    public function getValue()
    {
        return $this->Allergen;
    }

    public function setValue($value)
    {
        $this->Allergen = $value;
    }
}