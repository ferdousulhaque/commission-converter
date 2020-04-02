<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\resolver\Parser;

class ParserTest extends TestCase
{
    /**
     *
     */
    public function testJsonStringParser()
    {
        $text = '{"bin":"516793","amount":"50.00","currency":"USD"}';
        $result = Parser::jsonParser($text);
        $this->assertNotFalse($result);
    }

}