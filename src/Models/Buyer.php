<?php

namespace SoftwarePunt\DGXML\Models;

use SoftwarePunt\DGXML\AbstractModel;

/**
 * This is an optional area for identifying the buyer.
 */
class Buyer extends AbstractModel
{
    /**
     * Global Location Number identifying the buyer. Ideally, this is done using his main GLN (Buyer GLN).
     */
    public ?int $GLN = null;
}