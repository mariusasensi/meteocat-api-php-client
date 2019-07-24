<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Meteocat\Model\Query\XEMA\Representative as Representative;
use Meteocat\Model\Query\XEMA\Station as Station;
use Meteocat\Model\Query\XEMA\Measurement as Measurement;
use Meteocat\Model\Query\XEMA\Statistic as Statistic;
use Meteocat\Model\Query\XEMA\MultivariableCalculation as MultivariableCalculation;
use Meteocat\Model\Query\XEMA\Auxiliary as Auxiliary;

/**
 * Class QueryXEMATest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXEMATest extends TestCase
{
    public function testRepresentativeGetStationByCity()
    {
        $query = new Representative\GetStationByCity('080057', 32);

        $this->assertEquals('XEMA/Representative/GetStationByCity', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/municipis/080057/variables/32', $query->getUrl());
    }

    public function testRepresentativeGetAllVariableMetadata()
    {
        $query = new Representative\GetAllVariableMetadata();

        $this->assertEquals('XEMA/Representative/GetAllVariableMetadata', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/variables', $query->getUrl());
    }

    public function testStationAll()
    {
        // Without filters.
        $query1 = new Station\All();
        $this->assertEquals('XEMA/Station/All', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades', $query1->getUrl());

        // With state filter.
        $query2 = new Station\All();
        $query2
            ->withState('des');

        $this->assertEquals('XEMA/Station/All', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=des', $query2->getUrl());

        // With state and date filter.
        $query3 = new Station\All();
        $query3
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withState('ope');

        $this->assertEquals('XEMA/Station/All', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testStationGet()
    {
        $query = new Station\Get('UG');

        $this->assertEquals('XEMA/Station/Get', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/metadades', $query->getUrl());
    }

    public function testMeasurementGetByDay()
    {
        $query = new Measurement\GetByDay(32, DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'));
        $query
            ->withStation('UG');

        $this->assertEquals('XEMA/Measurement/GetByDay', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/32/2019/07/14?codiEstacio=UG', $query->getUrl());
    }

    public function testMeasurementLast()
    {
        $query = new Measurement\Last(5);
        $query
            ->withStation('UG');

        $this->assertEquals('XEMA/Measurement/Last', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/5/ultimes?codiEstacio=UG', $query->getUrl());
    }

    public function testMeasurementAllByStation()
    {
        // Without filters.
        $query1 = new Measurement\AllByStation('UG');
        $this->assertEquals('XEMA/Measurement/AllByStation', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades', $query1->getUrl());

        // With state filter.
        $query2 = new Measurement\AllByStation('UG');
        $query2
            ->withState('ope');

        $this->assertEquals('XEMA/Measurement/AllByStation', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope', $query2->getUrl());

        // With state and date filter.
        $query3 = new Measurement\AllByStation('UG');
        $query3
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withState('ope');

        $this->assertEquals('XEMA/Measurement/AllByStation', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testMeasurementGetByStation()
    {
        $query = new Measurement\GetByStation('UG', 3);

        $this->assertEquals('XEMA/Measurement/GetByStation', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/3/metadades', $query->getUrl());
    }

    public function testMeasurementAll()
    {
        $query = new Measurement\All();

        $this->assertEquals('XEMA/Measurement/All', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/metadades', $query->getUrl());
    }

    public function testMeasurementGet()
    {
        $query = new Measurement\Get(1);

        $this->assertEquals('XEMA/Measurement/Get', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/1/metadades', $query->getUrl());
    }

    public function testStatisticGetYearlyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetYearlyByVariable(3000);

        $this->assertEquals('XEMA/Statistic/GetYearlyByVariable', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3000', $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetYearlyByVariable(3000);
        $query2->withStation('UG');
        $this->assertEquals('XEMA/Statistic/GetYearlyByVariable', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3000?codiEstacio=UG', $query2->getUrl());
    }

    public function testStatisticGetMonthlyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetMonthlyByVariable(2000, DateTime::createFromFormat('y', '18'));

        $this->assertEquals('XEMA/Statistic/GetMonthlyByVariable', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2000?any=2018', $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetMonthlyByVariable(2000, DateTime::createFromFormat('y', '13'));
        $query2->withStation('UG');
        $this->assertEquals('XEMA/Statistic/GetMonthlyByVariable', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2000?codiEstacio=UG&any=2013', $query2->getUrl());
    }

    public function testStatisticGetDailyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetDailyByVariable(1001, DateTime::createFromFormat('F, y', 'january, 18'));

        $this->assertEquals('XEMA/Statistic/GetDailyByVariable', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001?any=2018&mes=01', $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetDailyByVariable(1001, DateTime::createFromFormat('y-m', '13-12'));
        $query2->withStation('UG');
        $this->assertEquals('XEMA/Statistic/GetDailyByVariable', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001?codiEstacio=UG&any=2013&mes=12', $query2->getUrl());
    }

    public function testStatisticGetYearlyMetadata()
    {
        $query = new Statistic\GetYearlyMetadata();

        $this->assertEquals('XEMA/Statistic/GetYearlyMetadata', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/metadades', $query->getUrl());
    }

    public function testStatisticGetYearlyMetadataByVariable()
    {
        $query = new Statistic\GetYearlyMetadataByVariable(3001);

        $this->assertEquals('XEMA/Statistic/GetYearlyMetadataByVariable', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3001/metadades', $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadata()
    {
        $query = new Statistic\GetMonthlyMetadata();

        $this->assertEquals('XEMA/Statistic/GetMonthlyMetadata', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/metadades', $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadataByVariable()
    {
        $query = new Statistic\GetMonthlyMetadataByVariable(2001);

        $this->assertEquals('XEMA/Statistic/GetMonthlyMetadataByVariable', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2001/metadades', $query->getUrl());
    }

    public function testStatisticGetDailyMetadata()
    {
        $query = new Statistic\GetDailyMetadata();

        $this->assertEquals('XEMA/Statistic/GetDailyMetadata', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/metadades', $query->getUrl());
    }

    public function testStatisticGetDailyMetadataByVariable()
    {
        $query = new Statistic\GetDailyMetadataByVariable(1001);

        $this->assertEquals('XEMA/Statistic/GetDailyMetadataByVariable', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001/metadades', $query->getUrl());
    }

    public function testStatisticGetYearlyMetadataByStation()
    {
        $query = new Statistic\GetYearlyMetadataByStation("CC");

        $this->assertEquals('XEMA/Statistic/GetYearlyMetadataByStation', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/anuals/metadades', $query->getUrl());
    }

    public function testStatisticGetYearlyMetadataByFilters()
    {
        $query = new Statistic\GetYearlyMetadataByFilters("CC", 3000);

        $this->assertEquals('XEMA/Statistic/GetYearlyMetadataByFilters', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/anuals/3000/metadades', $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadataByStation()
    {
        $query = new Statistic\GetMonthlyMetadataByStation("CC");

        $this->assertEquals('XEMA/Statistic/GetMonthlyMetadataByStation', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/mensuals/metadades', $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadataByFilters()
    {
        $query = new Statistic\GetMonthlyMetadataByFilters("CC", 2000);

        $this->assertEquals('XEMA/Statistic/GetMonthlyMetadataByFilters', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/mensuals/2000/metadades', $query->getUrl());
    }

    public function testStatisticGetDailyMetadataByStation()
    {
        $query = new Statistic\GetDailyMetadataByStation("CC");

        $this->assertEquals('XEMA/Statistic/GetDailyMetadataByStation', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/diaris/metadades', $query->getUrl());
    }

    public function testStatisticGetDailyMetadataByFilters()
    {
        $query = new Statistic\GetDailyMetadataByFilters("CC", 1000);

        $this->assertEquals('XEMA/Statistic/GetDailyMetadataByFilters', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/diaris/1000/metadades', $query->getUrl());
    }

    public function testMultivariableCalculationGetByFilters()
    {
        $query = new MultivariableCalculation\GetByFilters(6006, 'UG', DateTime::createFromFormat('Y-m-d', '2017-03-10'));

        $this->assertEquals('XEMA/MultivariableCalculation/GetByFilters', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/cmv/6006/2017/03/10?codiEstacio=UG', $query->getUrl());
    }

    public function testMultivariableCalculationGetMetadataByStation()
    {
        $query = new MultivariableCalculation\GetMetadataByStation('CC');

        $this->assertEquals('XEMA/MultivariableCalculation/GetMetadataByStation', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/cmv/metadades', $query->getUrl());
    }

    public function testMultivariableCalculationGetMetadataByFilters()
    {
        $query = new MultivariableCalculation\GetMetadataByFilters('UG', 6006);

        $this->assertEquals('XEMA/MultivariableCalculation/GetMetadataByFilters', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/cmv/6006/metadades', $query->getUrl());
    }

    public function testMultivariableCalculationAll()
    {
        $query = new MultivariableCalculation\All();

        $this->assertEquals('XEMA/MultivariableCalculation/All', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/cmv/metadades', $query->getUrl());
    }

    public function testMultivariableCalculationGetByVariable()
    {
        $query = new MultivariableCalculation\GetByVariable(6006);

        $this->assertEquals('XEMA/MultivariableCalculation/GetByVariable', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/cmv/6006/metadades', $query->getUrl());
    }

    public function testAuxiliaryGetByFilters()
    {
        $query = new Auxiliary\GetByFilters(900, 'CC', DateTime::createFromFormat('Y-m-d', '2017-03-10'));

        $this->assertEquals('XEMA/Auxiliary/GetByFilters', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/auxiliars/900/2017/03/10?codiEstacio=CC', $query->getUrl());
    }

    public function testAuxiliaryGetMetadataByStation()
    {
        // Without filters.
        $query = new Auxiliary\GetMetadataByStation('CC');

        $this->assertEquals('XEMA/Auxiliary/GetMetadataByStation', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/auxiliars/metadades', $query->getUrl());

        // With state filter.
        $query2 = new Auxiliary\GetMetadataByStation('CC');
        $query2
            ->withState('des');

        $this->assertEquals('XEMA/Auxiliary/GetMetadataByStation', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/auxiliars/metadades?estat=des', $query2->getUrl());

        // With state and date filter.
        $query3 = new Auxiliary\GetMetadataByStation('CC');
        $query3
            ->withDate(DateTime::createFromFormat('d-m-Y', '30-03-2017'))
            ->withState('ope');

        $this->assertEquals('XEMA/Auxiliary/GetMetadataByStation', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/auxiliars/metadades?estat=ope&data=2017-03-30Z', $query3->getUrl());
    }

    public function testAuxiliaryGetMetadataByFilters()
    {
        $query = new Auxiliary\GetMetadataByFilters('CC', 900);

        $this->assertEquals('XEMA/Auxiliary/GetMetadataByFilters', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/auxiliars/900/metadades', $query->getUrl());
    }

    public function testAuxiliaryAll()
    {
        $query = new Auxiliary\All();

        $this->assertEquals('XEMA/Auxiliary/All', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/auxiliars/metadades', $query->getUrl());
    }

    public function testAuxiliaryGetByVariable()
    {
        $query = new Auxiliary\GetByVariable(900);

        $this->assertEquals('XEMA/Auxiliary/GetByVariable', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/auxiliars/900/metadades', $query->getUrl());
    }
}
