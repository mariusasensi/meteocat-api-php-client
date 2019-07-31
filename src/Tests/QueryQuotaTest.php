<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Meteocat\Model\Query\Quota\Information as Information;

class QueryQuotaTest extends TestCase
{
    public function testGetCurrentUsage()
    {
        $query = new Information\GetCurrentUsage();

        $this->assertEquals('api.meteo.cat.quotes.v1.consum-actual', $query->getName());
        $this->assertEquals('https://api.meteo.cat/quotes/v1/consum-actual', $query->getUrl());
    }
}
