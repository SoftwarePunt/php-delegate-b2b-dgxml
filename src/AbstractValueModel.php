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

        $element = $document->createElement($elementName, $elementName);
        $element->nodeValue = (string)$this->getValue();

        foreach ($this->getFields() as $name => $value) {
            if (!preg_match('~^\p{Lu}~u', $name)) { // Name does NOT start with a capital letter
                $element->setAttribute($name, $value);
            }
        }

        return $element;
    }

    public function toContentDomElements(\DOMDocument $document): array
    {
        return [];
    }
}