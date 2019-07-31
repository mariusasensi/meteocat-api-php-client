<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Meteocat\Model\Query\Reference\Data as Data;

class QueryReferenceTest extends TestCase
{
    public function testGetAllCounties()
    {
        $query = new Data\GetAllCounties();

        $this->assertEquals('api.meteo.cat.referencia.v1.comarques', $query->getName());
        $this->assertEquals('https://api.meteo.cat/referencia/v1/comarques', $query->getUrl());
    }

    public function testGetAllCities()
    {
        $query = new Data\GetAllCities();

        $this->assertEquals('api.meteo.cat.referencia.v1.municipis', $query->getName());
        $this->assertEquals('https://api.meteo.cat/referencia/v1/municipis', $query->getUrl());
    }

    public function testGetAllSymbols()
    {
        $query = new Data\GetAllSymbols();

        $this->assertEquals('api.meteo.cat.referencia.v1.simbols', $query->getName());
        $this->assertEquals('https://api.meteo.cat/referencia/v1/simbols', $query->getUrl());
    }
}
