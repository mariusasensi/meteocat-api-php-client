<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\XEMA\Measurement;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseXEMAMeasurementTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class ResponseXEMAMeasurementTest extends TestCase
{
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
}
