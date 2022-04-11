# php-delegate-b2b-dgxml
**PHP Library for working with Delegate Group B2B XML files (DGXML)**.

[![PHPUnit](https://github.com/SoftwarePunt/php-delegate-b2b-dgxml/actions/workflows/phpunit.yml/badge.svg)](https://github.com/SoftwarePunt/php-delegate-b2b-dgxml/actions/workflows/phpunit.yml)
[![Version](http://poser.pugx.org/softwarepunt/php-delegate-b2b-dgxml/version)](https://packagist.org/packages/softwarepunt/psinfoodservice-api-client)

👉 Currently only supports exporting the Article-/Price Catalog to Delegate DGXML format.

## Installation
### Requirements
- PHP 8.0+
  - with extension: dom, intl
- [Composer](https://getcomposer.org/)

### Setup
Use Composer to add the package as a dependency to your project:

```shell
composer require softwarepunt/php-delegate-b2b-dgxml
```

## Usage

### Creating a catalog
Using this library, you can build the catalog by simply assigning PHP objects and values. The structure and property names match the XML and documentation. Each property is type-hinted and contains phpdocs based on the official documentation.

📕 To best understand the structure of the catalog, refer to the official documentation (`ArticleCatalog DGXML 1.0_EN`).

Create a new `ProductCatalog` and assign items to it, then export it as XML:

```php
<?php

use SoftwarePunt\DGXML\Documents\ProductCatalog;
use SoftwarePunt\DGXML\Models\Supplier;
use SoftwarePunt\DGXML\Models\CatalogItem;

require_once "vendor/autoload.php";

$catalog = new ProductCatalog();

$catalog->Header->Supplier = new Supplier();
$catalog->Header->Supplier->GLN = "9389229119441";
$catalog->Header->Supplier->Name = "Backshop";

$item = new CatalogItem();
$item->Number = 1602;
$item->Name = "Fuldkornsbrød";
$item->Price->Purchase = 1.6;

$catalog->Items[] = $item;

echo $catalog->toXml(); // <?xml ...
```

### Notes
- All text values are automatically transliterated to ASCII-only. This solves issues in the Delegate import process, but means special characters cannot be properly represented in the catalogs. 