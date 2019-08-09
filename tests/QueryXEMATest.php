<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Meteocat\Model\Query\XEMA\Representative;
use Meteocat\Model\Query\XEMA\Station;
use Meteocat\Model\Query\XEMA\Measurement;
use Meteocat\Model\Query\XEMA\Statistic;
use Meteocat\Model\Query\XEMA\MultivariableCalculation;
use Meteocat\Model\Query\XEMA\Auxiliary;

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

        $this->assertEquals('api.meteo.cat.xema.v1.representatives.metadades.municipis.080057.variables.32', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/municipis/080057/variables/32', $query->getUrl());
    }

    public function testRepresentativeGetAllVariableMetadata()
    {
        $query = new Representative\GetAllVariableMetadata();

        $this->assertEquals('api.meteo.cat.xema.v1.representatives.metadades.variables', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/variables', $query->getUrl());
    }

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
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testStationGetUnique()
    {
        $query = new Station\GetUnique('UG');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/metadades', $query->getUrl());
    }

    public function testMeasurementGetByDay()
    {
        $query = new Measurement\GetByDay(32, DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'));
        $query
            ->withStation('UG');

        $this->assertEquals('api.meteo.cat.xema.v1.variables.mesurades.32.2019.07.14.codiestacio.ug', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/32/2019/07/14?codiEstacio=UG', $query->getUrl());
    }

    public function testMeasurementGetLast()
    {
        $query = new Measurement\GetLast(5);
        $query
            ->withStation('UG');

        $this->assertEquals('api.meteo.cat.xema.v1.variables.mesurades.5.ultimes.codiestacio.ug', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/mesurades/5/ultimes?codiEstacio=UG', $query->getUrl());
    }

    public function testMeasurementGetAllByStation()
    {
        // Without filters.
        $query1 = new Measurement\GetAllByStation('UG');
        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.metadades', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades', $query1->getUrl());

        // With state filter.
        $query2 = new Measurement\GetAllByStation('UG');
        $query2
            ->withState('ope');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.metadades.estat.ope', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope', $query2->getUrl());

        // With state and date filter.
        $query3 = new Measurement\GetAllByStation('UG');
        $query3
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withState('ope');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.metadades.estat.ope.data.2019-07-14z', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testMeasurementGetByStation()
    {
        $query = new Measurement\GetByStation('UG', 3);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.3.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/mesurades/3/metadades', $query->getUrl());
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

    public function testStatisticGetYearlyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetYearlyByVariable(3000);

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.anuals.3000', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3000', $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetYearlyByVariable(3000);
        $query2->withStation('UG');
        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.anuals.3000.codiestacio.ug', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3000?codiEstacio=UG', $query2->getUrl());
    }

    public function testStatisticGetMonthlyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetMonthlyByVariable(2000, DateTime::createFromFormat('y', '18'));

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.mensuals.2000.any.2018', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2000?any=2018', $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetMonthlyByVariable(2000, DateTime::createFromFormat('y', '13'));
        $query2->withStation('UG');
        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.mensuals.2000.codiestacio.ug.any.2013', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2000?codiEstacio=UG&any=2013', $query2->getUrl());
    }

    public function testStatisticGetDailyByVariable()
    {
        // Without filters.
        $query1 = new Statistic\GetDailyByVariable(1001, DateTime::createFromFormat('F, y', 'january, 18'));

        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.diaris.1001.any.2018.mes.01', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001?any=2018&mes=01', $query1->getUrl());

        // With filter.
        $query2 = new Statistic\GetDailyByVariable(1001, DateTime::createFromFormat('y-m', '13-12'));
        $query2->withStation('UG');
        $this->assertEquals('api.meteo.cat.xema.v1.variables.estadistics.diaris.1001.codiestacio.ug.any.2013.mes.12', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001?codiEstacio=UG&any=2013&mes=12', $query2->getUrl());
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
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/anuals/3001/metadades', $query->getUrl());
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
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/mensuals/2001/metadades', $query->getUrl());
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
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/estadistics/diaris/1001/metadades', $query->getUrl());
    }

    public function testStatisticGetYearlyMetadataByStation()
    {
        $query = new Statistic\GetYearlyMetadataByStation('CC');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.anuals.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/anuals/metadades', $query->getUrl());
    }

    public function testStatisticGetYearlyMetadataByFilters()
    {
        $query = new Statistic\GetYearlyMetadataByFilters('CC', 3000);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.anuals.3000.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/anuals/3000/metadades', $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadataByStation()
    {
        $query = new Statistic\GetMonthlyMetadataByStation('CC');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.mensuals.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/mensuals/metadades', $query->getUrl());
    }

    public function testStatisticGetMonthlyMetadataByFilters()
    {
        $query = new Statistic\GetMonthlyMetadataByFilters('CC', 2000);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.mensuals.2000.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/mensuals/2000/metadades', $query->getUrl());
    }

    public function testStatisticGetDailyMetadataByStation()
    {
        $query = new Statistic\GetDailyMetadataByStation('CC');

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.diaris.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/diaris/metadades', $query->getUrl());
    }

    public function testStatisticGetDailyMetadataByFilters()
    {
        $query = new Statistic\GetDailyMetadataByFilters('CC', 1000);

        $this->assertEquals('api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.diaris.1000.metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/CC/variables/estadistics/diaris/1000/metadades', $query->getUrl());
    }

    public function testMultivariableCalculationGetByFilters()
    {
        $query = new MultivariableCalculation\GetByFilters(6006, 'UG', DateTime::createFromFormat('Y-m-d', '2017-03-10'));

        $this->assertEquals('api.meteo.cat.xema.v1.variables.cmv.6006.2017.03.10.codiestacio.ug', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/variables/cmv/6006/2017/03/10?codiEstacio=UG', $query->getUrl());
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
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/variables/cmv/6006/metadades', $query->getUrl());
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
