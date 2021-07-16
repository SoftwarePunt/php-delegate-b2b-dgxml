<?php

namespace Models;

use PHPUnit\Framework\TestCase;
use SoftwarePunt\DGXML\Models\CatalogItem;

class CatalogItemTest extends TestCase
{
    public function testSetDocumentLink()
    {
        $item = new CatalogItem();
        $item->setDocumentLink(2, "https://test.com");

        $this->assertCount(3, $item->DocumentLinks,
            "setDocumentLink(): Missing indexes should be inserted automatically");

        $this->assertSame("https://test.com", $item->DocumentLinks[2]->Link);
    }

    public function testSetImagePreviewLink()
    {
        $item = new CatalogItem();
        $item->setImagePreviewLink("https://test.com/img.jpg");

        $this->assertSame("https://test.com/img.jpg", $item->DocumentLinks[3]->Link,
            "setImagePreviewLink(): Should set 4th document link (index 3)");
    }
}
