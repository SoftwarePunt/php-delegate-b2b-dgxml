<?php

namespace SoftwarePunt\DGXML;

/**
 * A single-value model that can be expressed in DGXML.
 */
abstract class AbstractValueModel extends AbstractModel
{
    // -----------------------------------------------------------------------------------------------------------------
    // Single-value API

    public abstract function getValue();
    public abstract function setValue($value);

    // -----------------------------------------------------------------------------------------------------------------
    // Writing

    public function toDomElement(\DOMDocument $document, ?string $elementName = null): ?\DOMElement
    {
        if (!$elementName)
            $elementName = $this->getElementName();

        $element = new \DOMElement($elementName);
        $element->nodeValue = (string)$this->getValue();
        return $element;
    }

    public function toContentDomElements(\DOMDocument $document): array
    {
        return [];
    }
}