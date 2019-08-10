<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;

use Meteocat\Model\Query\XEMA\Station;
use Meteocat\Model\Query\XEMA\Measurement;
use Meteocat\Model\Query\XEMA\Statistic;
use Meteocat\Model\Query\XEMA\MultivariableCalculation;
use Meteocat\Model\Query\XEMA\Auxiliary;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseXEMA
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class ResponseXEMATest extends TestCase
{
    public function testStationGetAll()
    {
        $query = new Station\GetAll();
        $query
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withState('ope');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStationGetUnique()
    {
        $query = new Station\GetUnique('UG');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMeasurementGetByDay()
    {
        $query = new Measurement\GetByDay(32, DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'));
        $query
            ->withStation('UG');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMeasurementGetLast()
    {
        $query = new Measurement\GetLast(5);
        $query
            ->withStation('UG');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMeasurementGetAllByStation()
    {
        $query = new Measurement\GetAllByStation('UG');
        $query
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withState('ope');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMeasurementGetByStation()
    {
        $query = new Measurement\GetByStation('UG', 3);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMeasurementGetAll()
    {
        $query = new Measurement\GetAll();

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMeasurementGetUnique()
    {
        $query = new Measurement\GetUnique(1);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetYearlyByVariable()
    {
        $query = new Statistic\GetYearlyByVariable(3000);
        $query->withStation('UG');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetMonthlyByVariable()
    {
        $query = new Statistic\GetMonthlyByVariable(2000, DateTime::createFromFormat('y', '13'));
        $query->withStation('UG');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetDailyByVariable()
    {
        $query = new Statistic\GetDailyByVariable(1001, DateTime::createFromFormat('y-m', '13-12'));
        $query->withStation('UG');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetYearlyMetadata()
    {
        $query = new Statistic\GetYearlyMetadata();

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetYearlyMetadataByVariable()
    {
        $query = new Statistic\GetYearlyMetadataByVariable(3001);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetMonthlyMetadata()
    {
        $query = new Statistic\GetMonthlyMetadata();

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetMonthlyMetadataByVariable()
    {
        $query = new Statistic\GetMonthlyMetadataByVariable(2001);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetDailyMetadata()
    {
        $query = new Statistic\GetDailyMetadata();

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetDailyMetadataByVariable()
    {
        $query = new Statistic\GetDailyMetadataByVariable(1001);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetYearlyMetadataByStation()
    {
        $query = new Statistic\GetYearlyMetadataByStation('CC');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetYearlyMetadataByFilters()
    {
        $query = new Statistic\GetYearlyMetadataByFilters('CC', 3000);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetMonthlyMetadataByStation()
    {
        $query = new Statistic\GetMonthlyMetadataByStation('CC');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetMonthlyMetadataByFilters()
    {
        $query = new Statistic\GetMonthlyMetadataByFilters('CC', 2000);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetDailyMetadataByStation()
    {
        $query = new Statistic\GetDailyMetadataByStation('CC');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testStatisticGetDailyMetadataByFilters()
    {
        $query = new Statistic\GetDailyMetadataByFilters('CC', 1000);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMultivariableCalculationGetByFilters()
    {
        $query = new MultivariableCalculation\GetByFilters(6006, 'UG', DateTime::createFromFormat('Y-m-d', '2017-03-10'));

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMultivariableCalculationGetMetadataByStation()
    {
        $query = new MultivariableCalculation\GetMetadataByStation('CC');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMultivariableCalculationGetMetadataByFilters()
    {
        $query = new MultivariableCalculation\GetMetadataByFilters('UG', 6006);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMultivariableCalculationGetAll()
    {
        $query = new MultivariableCalculation\GetAll();

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testMultivariableCalculationGetByVariable()
    {
        $query = new MultivariableCalculation\GetByVariable(6006);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetByFilters()
    {
        $query = new Auxiliary\GetByFilters(900, 'CC', DateTime::createFromFormat('Y-m-d', '2017-03-10'));

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetMetadataByStation()
    {
        $query = new Auxiliary\GetMetadataByStation('CC');
        $query
            ->withDate(DateTime::createFromFormat('d-m-Y', '30-03-2017'))
            ->withState('ope');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetMetadataByFilters()
    {
        $query = new Auxiliary\GetMetadataByFilters('CC', 900);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetAll()
    {
        $query = new Auxiliary\GetAll();

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetByVariable()
    {
        $query = new Auxiliary\GetByVariable(900);

        // TODO.
        $this->markTestSkipped('TODO');
    }
}
