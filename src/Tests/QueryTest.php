<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class QueryTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryTest extends TestCase
{
    public function testRepresentativeStationQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Representative\Station('080057', 32);

        $this->assertEquals('XEMA/Representative/Station', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/municipis/080057/variables/32', $query->getUrl());
    }

    public function testRepresentativesVariableMetadataQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Representative\VariableMetadata();

        $this->assertEquals('XEMA/Representative/VariableMetadata', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/variables', $query->getUrl());
    }

    public function testStationAllQuery()
    {
        // Without filters.
        $query1 = new Meteocat\Model\Query\Xema\Station\All();
        $this->assertEquals('XEMA/Station/All', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades', $query1->getUrl());

        // With status filter.
        $query2 = new Meteocat\Model\Query\Xema\Station\All();
        $query2
            ->withStatus('des');

        $this->assertEquals('XEMA/Station/All', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=des', $query2->getUrl());

        // With status and date filter.
        $query3 = new Meteocat\Model\Query\Xema\Station\All();
        $query3
            ->withData(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withStatus('ope');

        $this->assertEquals('XEMA/Station/All', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testStationGetQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Station\Get('UG');

        $this->assertEquals('XEMA/Station/Get', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/metadades', $query->getUrl());
    }

    public function testMeasurementByDay()
    {
        $query = new Meteocat\Model\Query\Xema\Measurement\ByDay(32, DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'));
        $query
            ->withStation('UG');

        $this->assertEquals('XEMA/Measurement/ByDay', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/32/2019/07/14?codiEstacio=UG', $query->getUrl());
    }

    public function testMeasurementLast()
    {
        $query = new Meteocat\Model\Query\Xema\Measurement\Last(5);
        $query
            ->withStation('UG');

        $this->assertEquals('XEMA/Measurement/Last', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/5/ultimes?codiEstacio=UG', $query->getUrl());
    }

    public function testMeasurementAllByStation()
    {
        // Without filters.
        $query1 = new Meteocat\Model\Query\Xema\Measurement\AllByStation('UG');
        $this->assertEquals('XEMA/Measurement/AllByStation', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades', $query1->getUrl());

        // With status filter.
        $query2 = new Meteocat\Model\Query\Xema\Measurement\AllByStation('UG');
        $query2
            ->withStatus('ope');

        $this->assertEquals('XEMA/Measurement/AllByStation', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope', $query2->getUrl());

        // With status and date filter.
        $query3 = new Meteocat\Model\Query\Xema\Measurement\AllByStation('UG');
        $query3
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withStatus('ope');

        $this->assertEquals('XEMA/Measurement/AllByStation', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testMeasurementGetByStation()
    {
        $query = new Meteocat\Model\Query\Xema\Measurement\GetByStation('UG', 3);

        $this->assertEquals('XEMA/Measurement/GetByStation', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/3/metadades', $query->getUrl());
    }

    public function testMeasurementAll()
    {
        $query = new Meteocat\Model\Query\Xema\Measurement\All();

        $this->assertEquals('XEMA/Measurement/All', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/metadades', $query->getUrl());
    }

    public function testMeasurementGet()
    {
        $query = new Meteocat\Model\Query\Xema\Measurement\Get(1);

        $this->assertEquals('XEMA/Measurement/Get', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/1/metadades', $query->getUrl());
    }
}
