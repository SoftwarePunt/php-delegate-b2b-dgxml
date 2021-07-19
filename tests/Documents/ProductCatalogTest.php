<?php

namespace Documents;

use PHPUnit\Framework\TestCase;
use SoftwarePunt\DGXML\Documents\ProductCatalog;
use SoftwarePunt\DGXML\Models\CatalogItem;
use SoftwarePunt\DGXML\Models\FutureCatalogItemOptions;
use SoftwarePunt\DGXML\Models\FuturePrice;
use SoftwarePunt\DGXML\Models\Supplier;
use SoftwarePunt\DGXML\Models\Values\Allergen;

class ProductCatalogTest extends TestCase
{
    public function testCatalogToXml()
    {
        $catalog = new ProductCatalog();
        $catalog->Header->Supplier = new Supplier();
        $catalog->Header->Supplier->GLN = "9389229119441";
        $catalog->Header->Supplier->Name = "Backshop";
        $catalog->Header->SendDateTime = new \DateTime("2018-12-13T11:30:00");

        $catalogItem = new CatalogItem();
        $catalog->Items[] = $catalogItem;

        $catalogItem->Number = 1602;
        $catalogItem->Name = "Vollkornbrot";
        $catalogItem->OrderUnit = "KG";
        $catalogItem->ContainedUnit = "KG";
        $catalogItem->QtyContainedUnit = 1;
        $catalogItem->AdditiveFree = true;

        $catalogItem->Description->CatchWeight = 0;
        $catalogItem->Description->SplitPackage = false;
        $catalogItem->Description->FixedOrderQuantity = 35;
        $catalogItem->Description->ItemGroup = "Brot";
        $catalogItem->Description->MinimumShelfLifeDays = 3;

        $catalogItem->Price->Purchase = 1.6;

        $catalogItem->Options->Effective = true;
        $catalogItem->Options->ContractItem = true;

        $futurePrice1 = new FuturePrice();
        $futurePrice1->ValidFrom = new \DateTime("2019-12-01");
        $futurePrice1->Purchase = 2;
        $futurePrice1->Discount = 0.1;
        $catalogItem->FuturePrices[] = $futurePrice1;

        $futurePrice2 = new FuturePrice();
        $futurePrice2->ValidFrom = new \DateTime("2020-01-01");
        $futurePrice2->Purchase = 2;
        $futurePrice2->Discount = 0;
        $catalogItem->FuturePrices[] = $futurePrice2;

        $futureOption1 = new FutureCatalogItemOptions();
        $futureOption1->ValidFrom = new \DateTime("2020-07-01");
        $futureOption1->Effective = false;
        $catalogItem->FutureOptions[] = $futureOption1;

        $allergen1 = new Allergen();
        $allergen1->Allergen = "AU";
        $allergen1->contained = "YES";
        $catalogItem->Allergens[] = $allergen1;

        $allergen2 = new Allergen();
        $allergen2->Allergen = "AW";
        $allergen2->contained = "CANCONTAIN";
        $catalogItem->Allergens[] = $allergen2;

        $actual = $catalog->toXml();

        $expected = '<?xml version="1.0" encoding="utf-8"?>
<dgenh:PRICAT xmlns:dgenh="http://www.delegate-group.com/DGEnhPRICAT1.0" xmlns:xsd="https://www.w3.org/2001/XMLSchema">
  <Header>
    <Document>
      <Type>PRICAT</Type>
      <Version>1.0</Version>
    </Document>
    <Supplier>
      <GLN>9389229119441</GLN>
      <Name>Backshop</Name>
    </Supplier>
    <SendDateTime>2018-12-13T11:30:00</SendDateTime>
  </Header>
  <Items>
    <Item>
      <Number>1602</Number>
      <Name>Vollkornbrot</Name>
      <OrderUnit>KG</OrderUnit>
      <ContainedUnit>KG</ContainedUnit>
      <QtyContainedUnit>1</QtyContainedUnit>
      <AdditiveFree>1</AdditiveFree>
      <Description>
        <CatchWeight>0</CatchWeight>
        <SplitPackage>0</SplitPackage>
        <FixedOrderQuantity>35</FixedOrderQuantity>
        <ItemGroup>Brot</ItemGroup>
        <MinimumShelfLifeDays>3</MinimumShelfLifeDays>
      </Description>
      <Price>
        <Purchase>1.6</Purchase>
      </Price>
      <FuturePrices>
        <Price>
          <ValidFrom>2019-12-01</ValidFrom>
          <Purchase>2</Purchase>
          <Discount>0.1</Discount>
        </Price>
        <Price>
          <ValidFrom>2020-01-01</ValidFrom>
          <Purchase>2</Purchase>
          <Discount>0</Discount>
        </Price>
      </FuturePrices>
      <Options>
        <Effective>1</Effective>
        <ContractItem>1</ContractItem>
      </Options>
      <FutureOptions>
        <Options>
          <ValidFrom>2020-07-01</ValidFrom>
          <Effective>0</Effective>
        </Options>
      </FutureOptions>
      <Allergens>
        <Allergen contained="YES">AU</Allergen>
        <Allergen contained="CANCONTAIN">AW</Allergen>
      </Allergens>
    </Item>
  </Items>
</dgenh:PRICAT>
';

        $this->assertSame($expected, $actual);
    }
}
