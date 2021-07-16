<?php

namespace SoftwarePunt\DGXML\Models;

/**
 * A future prices of the article, with a start date.
 */
class FuturePrice extends Price
{
    /**
     * Indication of the date on which the price becomes valid (in YYYY-MM-DD format).
     */
    public ?\DateTime $ValidFrom = null;
}