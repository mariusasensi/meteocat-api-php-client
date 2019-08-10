<?php

declare(strict_types=1);

use Meteocat\Model\Query\XEMA\Statistic;
use PHPUnit\Framework\TestCase;

/**
 * Class QueryXEMATest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXEMAStatisticTest extends TestCase
{
    public function testStatisticGetYearlyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetYearlyByVariable(3000);

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.anuals.3000', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3000', $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetYearlyByVariable(3000);
        $query2->withStation('UG');
        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.anuals.3000.codiestacio.ug',
            $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3000?codiEstacio=UG',
            $query2->getUrl());
    }

    public function testStatisticGetMonthlyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetMonthlyByVariable(2000, DateTime::createFromFormat('y', '18'));

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.mensuals.2000.any.2018', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2000?any=2018',
            $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetMonthlyByVariable(2000, DateTime::createFromFormat('y', '13'));
        $query2->withStation('UG');
        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.mensuals.2000.codiestacio.ug.any.2013',
            $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2000?codiEstacio=UG&any=2013',
            $query2->getUrl());
    }

    public function testStatisticGetDailyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetDailyByVariable(1001, DateTime::createFromFormat('F, y', 'january, 18'));

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.diaris.1001.any.2018.mes.01',
            $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001?any=2018&mes=01',
            $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetDailyByVariable(1001, DateTime::createFromFormat('y-m', '13-12'));
        $query2->withStation('UG');
        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.diaris.1001.codiestacio.ug.any.2013.mes.12',
            $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001?codiEstacio=UG&any=2013&mes=12',
            $query2->getUrl());
    }

    public function testStatisticGetYearlyMetadata()
    {
        $query = new Statistic\GetYearlyMetadata();

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.anuals.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/metadades', $query->getUrl());
    }

    public function testStatisticGetYearlyMetadataByVariable()
    {
        $query = new Statistic\GetYearlyMetadataByVariable(3001);

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.anuals.3001.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3001/metadades',
            $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadata()
    {
        $query = new Statistic\GetMonthlyMetadata();

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.mensuals.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/metadades', $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadataByVariable()
    {
        $query = new Statistic\GetMonthlyMetadataByVariable(2001);

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.mensuals.2001.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2001/metadades',
            $query->getUrl());
    }

    public function testStatisticGetDailyMetadata()
    {
        $query = new Statistic\GetDailyMetadata();

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.diaris.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/metadades', $query->getUrl());
    }

    public function testStatisticGetDailyMetadataByVariable()
    {
        $query = new Statistic\GetDailyMetadataByVariable(1001);

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.diaris.1001.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001/metadades',
            $query->getUrl());
    }

    public function testStatisticGetYearlyMetadataByStation()
    {
        $query = new Statistic\GetYearlyMetadataByStation('CC');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.anuals.metadades',
            $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/anuals/metadades',
            $query->getUrl());
    }

    public function testStatisticGetYearlyMetadataByFilters()
    {
        $query = new Statistic\GetYearlyMetadataByFilters('CC', 3000);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.anuals.3000.metadades',
            $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/anuals/3000/metadades',
            $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadataByStation()
    {
        $query = new Statistic\GetMonthlyMetadataByStation('CC');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.mensuals.metadades',
            $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/mensuals/metadades',
            $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadataByFilters()
    {
        $query = new Statistic\GetMonthlyMetadataByFilters('CC', 2000);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.mensuals.2000.metadades',
            $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/mensuals/2000/metadades',
            $query->getUrl());
    }

    public function testStatisticGetDailyMetadataByStation()
    {
        $query = new Statistic\GetDailyMetadataByStation('CC');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.diaris.metadades',
            $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/diaris/metadades',
            $query->getUrl());
    }

    public function testStatisticGetDailyMetadataByFilters()
    {
        $query = new Statistic\GetDailyMetadataByFilters('CC', 1000);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.diaris.1000.metadades',
            $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/diaris/1000/metadades',
            $query->getUrl());
    }
}
