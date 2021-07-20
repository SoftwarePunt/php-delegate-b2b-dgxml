<?php

namespace SoftwarePunt\DGXML\Models\Values;

use SoftwarePunt\DGXML\AbstractValueModel;

/**
 * Link in which the file names or references containing additional information on the article can be submitted.
 */
class DocumentLink extends AbstractValueModel
{
    /**
     * Name of a file with information about the article (e.g. data sheet).
     *
     * The fourth "Link" element is reserved for image files: Name of an image file which is displayed as an image
     * preview in the order module of the Delegate myMMS & Patients Service Web Client.
     */
    public ?string $Link = null;

    // -----------------------------------------------------------------------------------------------------------------

    public function getValue()
    {
        return $this->Link;
    }

    public function setValue($value): void
    {
        $this->Link = $value;
    }
}