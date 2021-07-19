<?php

namespace SoftwarePunt\DGXML\Documents;

use SoftwarePunt\DGXML\AbstractDocument;
use SoftwarePunt\DGXML\Models\CatalogHeader;
use SoftwarePunt\DGXML\Models\CatalogItem;

class ProductCatalog extends AbstractDocument
{
    /**
     * The catalog header, which contains general information about the document, supplier and buyer.
     */
    public CatalogHeader $Header;

    /**
     * The "Items" area contains the items offered by the supplier
     *
     * @var CatalogItem[]
     */
    public array $Items = [];

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        $this->Header = new CatalogHeader();
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Writing

    public function toDomDocument(): \DOMDocument
    {
        $document = $this->createBaseDocument();

        $catalogRoot = $document->createElement('dgenh:PRICAT');
        $catalogRoot->setAttribute('xmlns:dgenh', "http://www.delegate-group.com/DGEnhPRICAT1.0");
        $catalogRoot->setAttribute('xmlns:xsd', "https://www.w3.org/2001/XMLSchema");

        foreach ($this->toContentDomElements($document) as $contentDomElement) {
            $catalogRoot->appendChild($contentDomElement);
        }

        $document->appendChild($catalogRoot);
        return $document;
    }
}
