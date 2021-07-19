<?php

namespace SoftwarePunt\DGXML;

/**
 * A model that can be expressed in DGXML.
 */
abstract class AbstractModel
{
    public function getElementName(): string
    {
        return get_class($this);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Writing

    public function toDomElement(\DOMDocument $document, ?string $elementName = null): ?\DOMElement
    {
        if (!$elementName)
            $elementName = $this->getElementName();

        $element = $document->createElement($elementName);
        $anyElements = false;

        foreach ($this->toContentDomElements($document) as $contentDomElement) {
            $element->appendChild($contentDomElement);
            $anyElements = true;
        }

        if (!$anyElements)
            return null;

        return $element;
    }

    /**
     * @return \DOMElement[]
     */
    public function toContentDomElements(\DOMDocument $document): array
    {
        $elements = [];

        foreach ($this->getFields() as $name => $value) {
            if ($value instanceof AbstractModel) {
                $element = $value->toDomElement($document, $name);
            } else {
                $element = $document->createElement($name);

                if (is_array($value)) {
                    foreach ($value as $subValue) {
                        if ($subValue instanceof AbstractModel) {
                            $element->appendChild($subValue->toDomElement($document));
                        }
                    }
                } else {
                    $element->nodeValue = $this->getNodeValue($value);
                }
            }

            if ($element)
                $elements[] = $element;
        }

        return $elements;
    }

    protected function getNodeValue($value)
    {
        if ($value instanceof \DateTime)
            return $value->format('Y-m-d');

        return (string)$value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Utils

    public function getFields(): array
    {
        $results = [];

        $rfClass = new \ReflectionClass($this);
        $rfProps = $rfClass->getProperties(\ReflectionProperty::IS_PUBLIC);

        foreach ($rfProps as $rfProp) {
            if ($rfProp->isStatic())
                // Only process properties on the model itself
                continue;

            $propName = $rfProp->getName();
            $propType = $rfProp->getType();
            $propValue = null;

            if (isset($this->$propName))
                // Prevent reading uninitialized properties
                $propValue = $this->$propName;

            if ($propValue === null)
                // If a property is null or unassigned, assume it should not be included
                continue;

            $results[$propName] = $propValue;
        }

        return $results;
    }

}