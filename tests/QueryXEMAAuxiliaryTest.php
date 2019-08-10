<?php

declare(strict_types=1);

use Meteocat\Model\Query\XEMA\Auxiliary;
use PHPUnit\Framework\TestCase;

/**
 * Class QueryXEMAAuxiliaryTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXEMAAuxiliaryTest extends TestCase
{
    public function testAuxiliaryGetByFilters()
    {
        $query = new Auxiliary\GetByFilters(900, 'CC', DateTime::createFromFormat('Y-m-d', '2017-03-10'));

        $this->assertEquals('api.meteo.cat.xema.v1.variables.auxiliars.900.2017.03.10.codiestacio.cc', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/auxiliars/900/2017/03/10?codiEstacio=CC', $query->getUrl());
    }

    public function testAuxiliaryGetMetadataByStation()
    {
        // Without filters.
        $query = new Auxiliary\GetMetadataByStation('CC');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.auxiliars.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/auxiliars/metadades', $query->getUrl());

        // With state filter.
        $query2 = new Auxiliary\GetMetadataByStation('CC');
        $query2
            ->withState('des');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.auxiliars.metadades.estat.des', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/auxiliars/metadades?estat=des', $query2->getUrl());

        // With state and date filter.
        $query3 = new Auxiliary\GetMetadataByStation('CC');
        $query3
            ->withDate(DateTime::createFromFormat('d-m-Y', '30-03-2017'))
            ->withState('ope');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.auxiliars.metadades.estat.ope.data.2017-03-30z', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/auxiliars/metadades?estat=ope&data=2017-03-30Z', $query3->getUrl());
    }

    public function testAuxiliaryGetMetadataByFilters()
    {
        $query = new Auxiliary\GetMetadataByFilters('CC', 900);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.auxiliars.900.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/auxiliars/900/metadades', $query->getUrl());
    }

    public function testAuxiliaryGetAll()
    {
        $query = new Auxiliary\GetAll();

        $this->assertEquals('api.meteo.cat.xema.v1.variables.auxiliars.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/auxiliars/metadades', $query->getUrl());
    }

    public function testAuxiliaryGetByVariable()
    {
        $query = new Auxiliary\GetByVariable(900);

        $this->assertEquals('api.meteo.cat.xema.v1.variables.auxiliars.900.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/auxiliars/900/metadades', $query->getUrl());
    }
}
