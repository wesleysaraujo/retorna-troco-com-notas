<?php

namespace Tests\Filters;

require_once __DIR__.'/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Filters\Strings;

class StringsTest extends TestCase
{
    const STRING = ' <title>PHPUnit</title> ';

    public $filterString;

    public function setUp()
    {
        $this->filterString = new Strings(self::STRING);
    }

    public function testStringLength()
    {
        $this->assertEquals(24, $this->filterString->stringLength());
    }
    
    public function testStripTags()
    {
        $this->assertEquals(' PHPUnit ', $this->filterString->stripTags());
    }

    public function testStringTrim()
    {
        $this->assertEquals('<title>PHPUnit</title>', $this->filterString->stringTrim());
    }

    public function testStringToLower()
    {
        $stringBase = strtolower(self::STRING);
        $filter = $this->filterString->stringToLower();

        $this->assertEquals(true, ($stringBase === $filter));
    }


    public function testStringToUpper()
    {
        $stringBase = strtoupper(self::STRING);
        $filter = $this->filterString->stringToUpper();
    
        $this->assertEquals(true, ( $stringBase === $filter));
    }
}
