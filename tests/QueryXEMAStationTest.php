<?php

declare(strict_types=1);

use Meteocat\Model\Query\XEMA\Station;
use PHPUnit\Framework\TestCase;

/**
 * Class QueryXEMAStationTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXEMAStationTest extends TestCase
{
    public function testStationGetAll()
    {
        // Without filters.
        $query1 = new Station\GetAll();
        $this->assertEquals('api.meteo.cat.xema.v1.estacions.metadades', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades', $query1->getUrl());

        // With state filter.
        $query2 = new Station\GetAll();
        $query2
            ->withState('des');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.metadades.estat.des', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=des', $query2->getUrl());

        // With state and date filter.
        $query3 = new Station\GetAll();
        $query3
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withState('ope');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.metadades.estat.ope.data.2019-07-14z', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=ope&data=2019-07-14Z',
            $query3->getUrl());
    }

    public function testStationGetUnique()
    {
        $query = new Station\GetUnique('UG');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/metadades', $query->getUrl());
    }
}
