<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\XEMA\MultivariableCalculation;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseXEMAMultivariableCalculationTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class ResponseXEMAMultivariableCalculationTest extends TestCase
{
    public function testMultivariableCalculationGetByFilters()
    {
        $query = new MultivariableCalculation\GetByFilters(6006, 'UG',
            DateTime::createFromFormat('Y-m-d', '2017-03-10'));

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
}
