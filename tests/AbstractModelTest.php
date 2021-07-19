<?php

use PHPUnit\Framework\TestCase;
use SoftwarePunt\DGXML\AbstractModel;

class AbstractModelTest extends TestCase
{
    public function testGetFields()
    {
        $model = new AbstractModelTest_TestImpl();
        $model->a = "test";
        $model->b = new AbstractModelTest_TestImpl();
        $model->c = [1, 2, 3];

        $actual = $model->getFields();

        $expected = [
            'a' => "test",
            'b' => new AbstractModelTest_TestImpl(),
            'c' => [1, 2, 3]
        ];

        $this->assertEquals($expected, $actual);
    }

    public function testGetFields_Uninitialized()
    {
        $model = new AbstractModelTest_TestImpl();
        $actual = $model->getFields();

        $expected = [];

        $this->assertEquals($expected, $actual);
    }
}

class AbstractModelTest_TestImpl extends AbstractModel
{
    public ?string $a = null;
    public AbstractModelTest_TestImpl $b;
    public array $c;
    public $d = null;
}