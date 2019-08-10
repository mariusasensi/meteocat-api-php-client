<?php

declare(strict_types=1);

use Meteocat\Model\Query\XEMA\MultivariableCalculation;
use PHPUnit\Framework\TestCase;

/**
 * Class QueryXEMAMultivariableCalculationTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXEMAMultivariableCalculationTest extends TestCase
{
    public function testMultivariableCalculationGetByFilters()
    {
        $query = new MultivariableCalculation\GetByFilters(6006, 'UG',
            DateTime::createFromFormat('Y-m-d', '2017-03-10'));

        $this->assertEquals('api.meteo.cat.xema.v1.variables.cmv.6006.2017.03.10.codiestacio.ug', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/cmv/6006/2017/03/10?codiEstacio=UG',
            $query->getUrl());
    }

    public function testMultivariableCalculationGetMetadataByStation()
    {
        $query = new MultivariableCalculation\GetMetadataByStation('CC');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.cmv.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/cmv/metadades', $query->getUrl());
    }

    public function testMultivariableCalculationGetMetadataByFilters()
    {
        $query = new MultivariableCalculation\GetMetadataByFilters('UG', 6006);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.cmv.6006.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/cmv/6006/metadades',
            $query->getUrl());
    }

    public function testMultivariableCalculationGetAll()
    {
        $query = new MultivariableCalculation\GetAll();

        $this->assertEquals('api.meteo.cat.xema.v1.variables.cmv.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/cmv/metadades', $query->getUrl());
    }

    public function testMultivariableCalculationGetByVariable()
    {
        $query = new MultivariableCalculation\GetByVariable(6006);

        $this->assertEquals('api.meteo.cat.xema.v1.variables.cmv.6006.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/cmv/6006/metadades', $query->getUrl());
    }
}
