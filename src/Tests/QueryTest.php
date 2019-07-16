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
    public function testRepresentativeRepresentativeStationQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Representative\RepresentativeStation('080057', 32);

        $this->assertEquals('XEMA/Representative/RepresentativeStation', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/municipis/080057/variables/32', $query->getUrl());
    }

    public function testRepresentativesVariableMetadataQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Representative\VariableMetadata();

        $this->assertEquals('XEMA/Representative/VariableMetadata', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/variables', $query->getUrl());
    }

    public function testEstacionsMetadadesTotesQuery()
    {
        // Without filters.
        $query1 = new Meteocat\Model\Query\Xema\Estacions\MetadadesTotes();
        $this->assertEquals('XEMA/Estacions/MetadadesTotes', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades', $query1->getUrl());

        // With status filter.
        $query2 = new Meteocat\Model\Query\Xema\Estacions\MetadadesTotes();
        $query2
            ->withEstat('des');

        $this->assertEquals('XEMA/Estacions/MetadadesTotes', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=des', $query2->getUrl());

        // With status and date filter.
        $query3 = new Meteocat\Model\Query\Xema\Estacions\MetadadesTotes();
        $query3
            ->withData(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withEstat('ope');

        $this->assertEquals('XEMA/Estacions/MetadadesTotes', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testEstacionsMetadadesQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Estacions\Metadades('UG');

        $this->assertEquals('XEMA/Estacions/Metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/metadades', $query->getUrl());
    }

    public function testMesuradesVariablePerData()
    {
        $query = new Meteocat\Model\Query\Xema\Mesurades\VariablePerData(32, DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'));
        $query
            ->withEstacio('UG');

        $this->assertEquals('XEMA/Mesurades/VariablePerData', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/32/2019/07/14?codiEstacio=UG', $query->getUrl());
    }

    public function testMesuradesVariableUltima()
    {
        $query = new Meteocat\Model\Query\Xema\Mesurades\VariableUltima(5);
        $query
            ->withEstacio('UG');

        $this->assertEquals('XEMA/Mesurades/VariableUltima', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/5/ultimes?codiEstacio=UG', $query->getUrl());
    }

    public function testMesuradesMetadadesEstacioTotes()
    {
        // Without filters.
        $query1 = new Meteocat\Model\Query\Xema\Mesurades\MetadadesEstacioTotes('UG');
        $this->assertEquals('XEMA/Mesurades/MetadadesEstacioTotes', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades', $query1->getUrl());

        // With status filter.
        $query2 = new Meteocat\Model\Query\Xema\Mesurades\MetadadesEstacioTotes('UG');
        $query2
            ->withEstat('ope');

        $this->assertEquals('XEMA/Mesurades/MetadadesEstacioTotes', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope', $query2->getUrl());

        // With status and date filter.
        $query3 = new Meteocat\Model\Query\Xema\Mesurades\MetadadesEstacioTotes('UG');
        $query3
            ->withData(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withEstat('ope');

        $this->assertEquals('XEMA/Mesurades/MetadadesEstacioTotes', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testMesuradesMetadadesEstacio()
    {
        $query = new Meteocat\Model\Query\Xema\Mesurades\MetadadesEstacio('UG', 3);

        $this->assertEquals('XEMA/Mesurades/MetadadesEstacio', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/3/metadades', $query->getUrl());
    }

    public function testMesuradesMetadadesTotes()
    {
        $query = new Meteocat\Model\Query\Xema\Mesurades\MetadadesTotes();

        $this->assertEquals('XEMA/Mesurades/MetadadesTotes', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/metadades', $query->getUrl());
    }

    public function testMesuradesMetadades()
    {
        $query = new Meteocat\Model\Query\Xema\Mesurades\Metadades(1);

        $this->assertEquals('XEMA/Mesurades/Metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/1/metadades', $query->getUrl());
    }
}
