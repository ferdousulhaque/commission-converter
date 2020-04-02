<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\resolver\Http;

class HttpTest extends TestCase
{
    /**
     * @var string
     */
    private static $url = 'https://google.com';

    /**
     *
     */
    public function testHttpCurlCall()
    {
        $result = Http::request(self::$url,'get');
        $this->assertNotFalse($result);
    }

}