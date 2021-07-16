<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;
use SoftwarePunt\DGXML\Models\Values\Additive;
use SoftwarePunt\DGXML\Models\Values\Allergen;
use SoftwarePunt\DGXML\Models\Values\DocumentLink;
use SoftwarePunt\DGXML\Models\Values\Information;
use SoftwarePunt\DGXML\Models\Values\NutrientValue;
use SoftwarePunt\DGXML\Models\Values\TaxFee;

/**
 * Represents a single product offered by a supplier in a catalog.
 */
class CatalogItem extends AbstractModel
{
    /**
     * The article number serves to uniquely identify the article.
     */
    public string $Number;
    
    /**
     * Optional alternative article number.
     *
     * This could be, for example, a number used internally by the customer or supplier or a possible
     * reference number of the article.
     */
    public ?string $AlternativeNumber = null;
    
    /**
     * Container unit or packaging GTIN or EAN.
     */
    public ?string $GTIN = null;
    
    /**
     * Article GTIN or EAN.
     */
    public ?string $GTINOrderUnit = null;
    
    /**
     * The name of the article.
     */
    public string $Name;
    
    /**
     * This field is filled with the name of the unit in which the item must be ordered.
     */
    public string $OrderUnit;
    
    /**
     * What is contained in your packaging unit from the "OrderUnit" field? What does it consist of?
     */
    public string $ContainedUnit;
    
    /**
     * This number field defines the quantity in the packaging.
     */
    public int $QtyContainedUnit;
    
    /**
     * Sales price recommended by the manufacturer/supplier.
     */
    public ?float $SalesPrice = null;
    
    /**
     * In this number field, you can enter the applicable value-added tax for the article in percent (e.g. 0.21 for 21%).
     */
    public ?float $VAT = null;
    
    /**
     * Here you can store the currency of the prices as an abbreviation with 3 letters.
     */
    public ?string $Currency = null;
    
    /**
     * Indicates whether NO allergens of any kind are contained in the article.
     */
    public ?bool $AllergenFree = null;
    
    /**
     * Indicates whether NO additives of any kind are contained in the article.
     */
    public ?bool $AdditiveFree = null;

    /**
     * The "Description" area is part of the "Item" area. It contains additional information about the item.
     */
    public CatalogItemDescription $Description;

    /**
     * This area contains the current price information.
     */
    public Price $Price;

    /**
     * The "FuturePrices" section contains the future prices of the article.
     *
     * @var FuturePrice[]
     */
    public array $FuturePrices = [];

    /**
     * In the "Options" area, it is indicated whether the article can be ordered and whether it is a contract article
     * ...is trading.
     */
    public CatalogItemOptions $Options;

    /**
     * "FutureOptions" contains the future changes of the attributes specified under "Options".
     *
     * @var CatalogItemOptions[]
     */
    public array $FutureOptions = [];

    /**
     * The "DocumentLinks" area contains four "link" elements in which the file names or references to up to four
     * files containing additional information on the article can be submitted.
     *
     * The fourth "Link" element is reserved for image files: Name of an image file which is displayed as an image
     * preview in the order module of the Delegate myMMS & Patients Service Web Client.
     *
     * @var DocumentLink[]
     */
    public array $DocumentLinks = [];

    /**
     * Under "AdditionalTaxesFees" up to three additional taxes or fees levied on the article can be maintained.
     *
     * @var TaxFee[]
     */
    public array $AdditionalTaxesFees = [];

    /**
     * Here information can be transmitted regarding the allergens the article contains. The "Allergen" section can
     * contain any number of "allergen" elements with the codes of the individual allergens.
     *
     * @var Allergen[]
     */
    public array $Allergens = [];

    /**
     * Information concerning the additives contained in the article can be submitted here. The "Additives" section can
     * contain any number of "Additive" elements with the codes of the individual additives.
     *
     * @var Additive[]
     */
    public array $Additives = [];

    /**
     * Here you can transmit further additional information about the article. The "Information" section can contain
     * any number of "Information" elements with the codes of the individual pieces of information.
     *
     * @var Information[]
     */
    public array $Information = [];

    /**
     * Here the nutritional values of the article can be transmitted. The "NutrientValues" area can contain any number
     * of "NutrientValue" elements. The code of the respective nutrition value (e.g. "GCAL") must be entered as
     * "code" must be contained in the "NutrientValue" tag (e.g. <NutrientValue code="GCAL">). A list of valid
     * nutritional codes is given in Chapter 7 LIST OF STANDARD CODES FOR NUTRIENT FACTS.
     *
     * @var NutrientValue[]
     */
    public array $NutrientValues = [];

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        $this->Description = new CatalogItemDescription();
        $this->Price = new Price();
        $this->Options = new FutureCatalogItemOptions();
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function setDocumentLink(int $index, string $link): void
    {
        if ($index >= 4)
            throw new \InvalidArgumentException("Invalid index: only 4 document links are permitted");

        // Links can behave different by their index, so ensure all the previous indexes are present
        for ($i = 0; $i < $index; $i++) {
            if (!isset($this->DocumentLinks[$i])) {
                $this->DocumentLinks[$i] = new DocumentLink();
            }
        }

        $dl = new DocumentLink();
        $dl->Link = $link;

        $this->DocumentLinks[$index] = $dl;
    }

    public function setImagePreviewLink(string $link)
    {
        $this->setDocumentLink(3, $link);
    }
}