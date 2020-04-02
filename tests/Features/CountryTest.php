<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\resolver\Country;

class CountryTest extends TestCase
{
    /**
     * @var string
     */
    private static $bin = '41417360';

    /**
     *
     */
    public function testSearchCountry()
    {
        $result = Country::resolveCountry(self::$bin);
        $this->assertNotEmpty($result);
    }

    /**
     *
     */
    public function testEuropeanCountryDetect()
    {
        $result = Country::isEU(self::$bin);
        $this->assertFalse($result);
    }

}