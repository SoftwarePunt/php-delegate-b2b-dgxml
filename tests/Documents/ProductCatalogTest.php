<?php

namespace Documents;

use PHPUnit\Framework\TestCase;
use SoftwarePunt\DGXML\Documents\ProductCatalog;

class ProductCatalogTest extends TestCase
{
    public function testEmptyCatalogToXml()
    {
        $expected = '<?xml version="1.0" encoding="utf-8"?>
<dgenh:PRICAT xmlns:dgenh="http://www.delegate-group.com/DGEnhPRICAT1.0" xmlns:xsd="https://www.w3.org/2001/XMLSchema">
  <Header>
    <Document>
      <Type>PRICAT</Type>
      <Version>1.0</Version>
    </Document>
    <SendDateTime>2021-07-19</SendDateTime>
  </Header>
  <Items/>
</dgenh:PRICAT>
';

        $actual = (new ProductCatalog())->toXml();

        $this->assertSame($expected, $actual);
    }
}
