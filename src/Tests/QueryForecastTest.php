<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Meteocat\Model\Query\Forecast\Forecasting as Forecast;

class QueryForecastTest extends TestCase
{
    public function testGetCatalunyaByDate()
    {
        $query = new Forecast\GetCatalunyaByDate(DateTime::createFromFormat('Y-m-d', '2017-04-30'));

        $this->assertEquals('Forecast/Forecasting/GetCatalunyaByDate', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/catalunya/2017/04/30', $query->getUrl());
    }

    public function testGetCountyByDate()
    {
        $query = new Forecast\GetCountyByDate(DateTime::createFromFormat('Y-m-d', '2017-04-30'));

        $this->assertEquals('Forecast/Forecasting/GetCountyByDate', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/comarcal/2017/04/30', $query->getUrl());
    }

    public function testGetByCity()
    {
        $query = new Forecast\GetByCity('250019');

        $this->assertEquals('Forecast/Forecasting/GetByCity', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/municipal/250019', $query->getUrl());
    }

    public function testGetCurrentWarnings()
    {
        $query = new Forecast\GetCurrentWarnings();

        $this->assertEquals('Forecast/Forecasting/GetCurrentWarnings', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/smp/episodis-oberts', $query->getUrl());
    }

    public function testGetCurrentAlerts()
    {
        $query = new Forecast\GetCurrentAlerts();

        $this->assertEquals('Forecast/Forecasting/GetCurrentAlerts', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/smp/episodis-oberts/preavisos', $query->getUrl());
    }

    public function testGetPyreneesMountainPeakMetadata()
    {
        $query = new Forecast\GetPyreneesMountainPeakMetadata();

        $this->assertEquals('Forecast/Forecasting/GetPyreneesMountainPeakMetadata', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/pirineu/pics/metadades', $query->getUrl());
    }

    public function testGetPyreneesMountainHuntMetadata()
    {
        $query = new Forecast\GetPyreneesMountainHuntMetadata();

        $this->assertEquals('Forecast/Forecasting/GetPyreneesMountainHuntMetadata', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/pirineu/refugis/metadades', $query->getUrl());
    }

    public function testGetPyreneesMountainPeakByDate()
    {
        $query = new Forecast\GetPyreneesMountainPeakByDate('el-taga', DateTime::createFromFormat('Y-m-d', '2017-04-20'));

        $this->assertEquals('Forecast/Forecasting/GetPyreneesMountainPeakByDate', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/pirineu/pics/el-taga/2017/04/20', $query->getUrl());
    }

    public function testGetPyreneesMountainHuntByDate()
    {
        $query = new Forecast\GetPyreneesMountainHuntByDate('refugi-colomina', DateTime::createFromFormat('Y-m-d', '2017-04-20'));

        $this->assertEquals('Forecast/Forecasting/GetPyreneesMountainHuntByDate', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/pirineu/refugis/refugi-colomina/2017/04/20', $query->getUrl());
    }

    public function testGetPyreneesZonesByDates()
    {
        $query = new Forecast\GetPyreneesZonesByDate(DateTime::createFromFormat('Y-m-d', '2017-04-19'));

        $this->assertEquals('Forecast/Forecasting/GetPyreneesZonesByDate', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/pirineu/2017/04/19', $query->getUrl());
    }

    public function testGetUltravioletIndexByCity()
    {
        $query = new Forecast\GetUltravioletIndexByCity('080018');

        $this->assertEquals('Forecast/Forecasting/GetUltravioletIndexByCity', $query->getName());
        $this->assertEquals('https://api.meteo.cat/pronostic/v1/uvi/080018', $query->getUrl());
    }
}
