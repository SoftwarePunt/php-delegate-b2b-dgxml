<?php

namespace SoftwarePunt\DGXML;

abstract class AbstractDocument extends AbstractModel
{
    // -----------------------------------------------------------------------------------------------------------------
    // Implementation

    public abstract function toDomDocument(): \DOMDocument;

    // -----------------------------------------------------------------------------------------------------------------
    // Writing

    protected function createBaseDocument(): \DOMDocument
    {
        return new \DOMDocument('1.0', 'utf-8');
    }

    public function toXml(): string
    {
        $document = $this->toDomDocument();
        $document->preserveWhiteSpace = false;
        $document->formatOutput = true;
        return $document->saveXML();
    }

    public function __toString()
    {
        return $this->toXml();
    }
}