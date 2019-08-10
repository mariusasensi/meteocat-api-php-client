<?php

declare(strict_types=1);

use Meteocat\Model\Query\XEMA\Measurement;
use PHPUnit\Framework\TestCase;

/**
 * Class QueryXEMAMeasurementTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXEMAMeasurementTest extends TestCase
{
    public function testMeasurementGetByDay()
    {
        $query = new Measurement\GetByDay(32, DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'));
        $query
            ->withStation('UG');

        $this->assertEquals('api.meteo.cat.xema.v1.variables.mesurades.32.2019.07.14.codiestacio.ug',
            $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/32/2019/07/14?codiEstacio=UG',
            $query->getUrl());
    }

    public function testMeasurementGetLast()
    {
        $query = new Measurement\GetLast(5);
        $query
            ->withStation('UG');

        $this->assertEquals('api.meteo.cat.xema.v1.variables.mesurades.5.ultimes.codiestacio.ug', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/5/ultimes?codiEstacio=UG',
            $query->getUrl());
    }

    public function testMeasurementGetAllByStation()
    {
        // Without filters.
        $query1 = new Measurement\GetAllByStation('UG');
        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.metadades', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades',
            $query1->getUrl());

        // With state filter.
        $query2 = new Measurement\GetAllByStation('UG');
        $query2
            ->withState('ope');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.metadades.estat.ope',
            $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope',
            $query2->getUrl());

        // With state and date filter.
        $query3 = new Measurement\GetAllByStation('UG');
        $query3
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withState('ope');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.metadades.estat.ope.data.2019-07-14z',
            $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope&data=2019-07-14Z',
            $query3->getUrl());
    }

    public function testMeasurementGetByStation()
    {
        $query = new Measurement\GetByStation('UG', 3);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.3.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/3/metadades',
            $query->getUrl());
    }

    public function testMeasurementGetAll()
    {
        $query = new Measurement\GetAll();

        $this->assertEquals('api.meteo.cat.xema.v1.variables.mesurades.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/metadades', $query->getUrl());
    }

    public function testMeasurementGetUnique()
    {
        $query = new Measurement\GetUnique(1);

        $this->assertEquals('api.meteo.cat.xema.v1.variables.mesurades.1.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/1/metadades', $query->getUrl());
    }
}
