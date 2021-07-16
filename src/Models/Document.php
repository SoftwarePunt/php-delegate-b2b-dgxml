<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;

/**
 * The "Document" section contains general information about the catalog.
 */
class Document extends AbstractModel
{
    public const DefaultType = "PRICAT";
    public const DefaultVersion = "1.0";

    /**
     * Document Type – This field is filled with PRICAT per default.
     * PRICAT stands for PRIce CATalogue.
     */
    public ?string $Type = self::DefaultType;

    /**
     * For future use: Interface version - is filled with 1.0 by default.
     */
    public ?string $Version = self::DefaultVersion;

    /**
     * For future use: catalogue number - serves to identify the catalogue.
     * The main purpose of this field is to distinguish individual catalogues from one another.
     *
     * The field can simply be filled sequentially with a counter.
     * Calendar weeks, months or quarterly figures can also be used.
     *
     * It would be useful and desirable to have a unique identification.
     */
    public ?string $CatalogNumber = null;
}