<?php

namespace SoftwarePunt\DGXML;

/**
 * A single-value model that can be expressed in DGXML.
 */
abstract class AbstractValueModel extends AbstractModel
{
    public abstract function getValue();
    public abstract function setValue($value);
}