<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;

/**
 * The "Description" area is part of the "Item" area. It contains additional information about the item.
 */
class CatalogItemDescription extends AbstractModel
{
    /**
     * The interface in the delegate system sets the name of the unit from the contents of the OrderUnit fields,
     * "QtyContainedUnit" (quantity of single unit in the container unit) and "ContainedUnit" (name of the single unit)
     * together. Example: "Leg of lamb 2 KG".
     */
    public ?string $AlternativeOrderUnit = null;

    /**
     * Article code for other marking of articles (e.g.: new article, discontinued article, not available from stock...)
     */
    public ?string $Characteristic = null;

    /**
     * Here a short information about the article can be deposited.
     *
     * This field is usually used to inform the customer whether an article has to be pre-ordered for a longer period
     * or whether special delivery conditions (only available on Fridays) apply to it.
     */
    public ?string $ShortInfo = null;

    /**
     * If the 60 characters in the "Name" field are not sufficient to adequately describe the article, an additional
     * description can be added here.
     */
    public ?string $AdditionalDescription = null;

    /**
     * Base unit of the article (STK, KG or L)
     */
    public ?string $BaseUnit = null;

    /**
     * Indicator for weight articles or goods receipt in base unit.
     *
     * Must be set if the article is delivered/charged in a different unit (usually the base unit) than the one
     * ordered. This is especially the case for  weight articles.
     *
     * Weight-bearing articles are articles that are usually ordered in a unit of measure with an approximate weight
     * (for example, "carton, approx. 2.5 KG") and are then delivered and invoiced with an exact weight in kilograms.
     *
     * For these articles this field must be set.
     */
    public bool $CatchWeight;

    /**
     * Partial delivery of the article is possible if the field is set.
     *
     * The article can therefore be placed in a smaller unit (usually the individual unit from the field
     * "ContainedUnit") delivered/ordered will be.
     */
    public bool $SplitPackage;

    /**
     * Indicator for daily price. If this field is filled with 1, the price of an item is marked as the current price,
     * which is better requested from the vendor before the order is placed.
     *
     * Often applies to market prices for freshly caught fish or seasonal vegetables.
     */
    public ?bool $DailyPriceTag = null;

    /**
     * If an article can only be ordered in a certain fixed order quantity, this quantity is stored in this field.
     * The ordered quantity of the item can then only ever be a multiple of the fixed order quantity.
     */
    public ?int $FixedOrderQuantity = null;

    /**
     * The name of the main group.
     */
    public ?string $MajorItemGroup = null;

    /**
     * The name of the article or product group.
     */
    public ?string $ItemGroup = null;

    /**
     * Article classification / assortment (promotion, user-related assortments)
     */
    public ?string $Classification = null;

    /**
     * The name of the manufacturer / producer
     */
    public ?string $Producer = null;

    /**
     * The GLN of the manufacturer / producer
     */
    public ?string $ProducerGLN = null;

    /**
     * The manufacturer article number is used to identify an article and the  numbers/IDs used by the manufacturer.
     * This can also be an EAN.
     */
    public ?string $ProducerItemNumber = null;

    /**
     * The brand name of the article.
     */
    public ?string $BrandName = null;

    /**
     * For future use: Country/place where the main ingredient has been produced or manufactured.
     */
    public ?string $PlaceofOrigin = null;

    /**
     * Country in which the goods were obtained or produced.
     */
    public ?string $CountryofOrigin = null;

    /**
     * For future use: In this field the legally correct product designation according to LMIV can be stored.
     */
    public ?string $LegalProductName = null;

    /**
     * For future use: If there is a legally binding marking for the article, this can be entered in this free text field.
     */
    public ?string $MandatoryLabeling = null;

    /**
     * For future use: The contact address of the food business operator can be entered in this free text field.
     * Usually this is the address printed on the packaging of an article.
     */
    public ?string $FoodBusinessAdress = null;

    /**
     * For future use: Any storage instructions for the article can be stored in this free text field.
     */
    public ?string $StorageAdvice = null;

    /**
     * For future use: Any preparation instructions for the article can be entered in this free text field.
     */
    public ?string $PreparationAdvice = null;

    /**
     * For future use: This free text field can be used to manage the list of ingredients of an article.
     * Usually this is also stored under "ingredients" are listed on the packaging of the article.
     */
    public ?string $IngredientsList = null;

    /**
     * Number of days it takes the supplier to deliver the item.
     */
    public ?int $OrderLeadDays = null;

    /**
     * For future use: This number field is used to store the remaining days to run for the article.
     *
     * They tell you how many days a delivered article can have until the expiration of the shelf life expiration
     * date (SLED).
     */
    public ?int $MinimumShelfLifeDays = null;

    /**
     * If this field is true, the article is considered a deposit article in this position.
     * For all other items the field can be left null or false.
     */
    public ?bool $DepositItem = null;

    /**
     * The BLS key is a code which serves to identify an article in the Federal Foodstuff Key (BLS).
     */
    public ?string $BLSKeys = null;

    /**
     * The nutritional values of a foodstuff listed in the Federal Food Code (BLS) are always designed for 100g.
     *
     * This number field is filled with the factor which establishes the reference of 100g/100ml of the BLS to the net
     * weight of the article from the field "BLSKeys".
     */
    public ?float $BLSFactor = null;

    /**
     * In the case of a container, this number field can be filled with the net or drained weight of the individual
     * article in KG.
     */
    public ?float $NetWeight = null;

    // -----------------------------------------------------------------------------------------------------------------

    public function getElementName(): string
    {
        return "Description";
    }
}