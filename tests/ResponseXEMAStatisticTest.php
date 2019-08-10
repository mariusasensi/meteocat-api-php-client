<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\XEMA\Statistic;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseXEMAStatisticTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class ResponseXEMAStatisticTest extends TestCase
{
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
}
