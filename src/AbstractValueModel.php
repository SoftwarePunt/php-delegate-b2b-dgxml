<?php

namespace SoftwarePunt\DGXML;

use SoftwarePunt\DGXML\Utils\AsciiTransliterator;

/**
 * A single-value model that can be expressed in DGXML.
 */
abstract class AbstractValueModel extends AbstractModel
{
    // -----------------------------------------------------------------------------------------------------------------
    // Single-value API

    /**
     * @return mixed|null
     */
    public abstract function getValue();

    /**
     * @param mixed|null $value
     */
    public abstract function setValue($value): void;

    // -----------------------------------------------------------------------------------------------------------------
    // Writing

    public function toDomElement(\DOMDocument $document, ?string $elementName = null): ?\DOMElement
    {
        if (!$elementName)
            $elementName = $this->getElementName();

        $element = $document->createElement($elementName, $elementName);
        $element->textContent = AsciiTransliterator::transliterate(
            $this->getNodeValue($elementName, $this->getValue())
        );

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