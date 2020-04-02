<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\resolver\Rate;

class RateTest extends TestCase
{
    /**
     * @var string
     */
    private static $fix = 'USD';

    /**
     *
     */
    public function testRateFound()
    {
        $result = Rate::getRate(self::$fix);
        $this->assertNotFalse($result);
    }

}