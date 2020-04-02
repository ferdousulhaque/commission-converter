<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\resolver\Reader;

class ReaderTest extends TestCase
{

    /**
     *
     */
    public function testReadAFile()
    {
        $file = Reader::fileLineToArray(realpath('../').'input.txt');
        $this->assertNotFalse($file);
    }
}