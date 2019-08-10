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
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.cmv.6006.2019.08.01.codiestacio.ug.json');

        /** @var MultivariableCalculation\GetByFilters $query */
        $query = new MultivariableCalculation\GetByFilters(6006, 'UG', DateTime::createFromFormat('Y-m-d', '2019-08-01'));

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(6006, $entityResponse->getCode());
        $this->assertEquals(null, $entityResponse->getName());
        $this->assertEquals(null, $entityResponse->getUnit());
        $this->assertEquals(null, $entityResponse->getAcronym());
        $this->assertEquals(null, $entityResponse->getType());
        $this->assertEquals(0, $entityResponse->getDecimals());

        $reads = $entityResponse->getReadings();
        $this->assertIsArray($reads);
        $this->assertCount(22, $reads);

        /** @var Entity\Read $read1 */
        $read1 = current($reads);
        $this->assertInstanceOf(Entity\Read::class, $read1);
        $this->assertInstanceOf(DateTime::class, $read1->getDate());
        $this->assertEquals('2019-08-01 00:00', $read1->getDate()->format('Y-m-d H:i'));
        $this->assertEquals(0, $read1->getValue());
        $this->assertEquals(' ', $read1->getStatus());
        $this->assertEquals('HO', $read1->getTimeBase());
    }

    public function testMultivariableCalculationGetMetadataByStation()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.cmv.metadades.json');

        /** @var MultivariableCalculation\GetMetadataByStation $query */
        $query = new MultivariableCalculation\GetMetadataByStation('CC');

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(1, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(6006, $variable1->getCode());
        $this->assertEquals('Evapotranspiració de referència', $variable1->getName());
        $this->assertEquals('mm', $variable1->getUnit());
        $this->assertEquals('ETo', $variable1->getAcronym());
        $this->assertEquals('CMV', $variable1->getType());
        $this->assertEquals(2, $variable1->getDecimals());

        /** @var array $intervals */
        $intervals = $variable1->getTemporalIntervals();
        $this->assertIsArray($intervals);
        $this->assertCount(1, $intervals);

        /** @var Entity\TemporalInterval $intervals1 */
        $intervals1 = current($intervals);
        $this->assertInstanceOf(Entity\TemporalInterval::class, $intervals1);
        $this->assertEquals('HO', $intervals1->getCode());
        $this->assertInstanceOf(DateTime::class, $intervals1->getDateStart());
        $this->assertEquals('1995-11-15 11:00:00', $intervals1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $intervals1->getDateEnd());
    }

    public function testMultivariableCalculationGetMetadataByFilters()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.ug.variables.cmv.6006.metadades.json');

        /** @var MultivariableCalculation\GetMetadataByFilters $query */
        $query = new MultivariableCalculation\GetMetadataByFilters('UG', 6006);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(6006, $entityResponse->getCode());
        $this->assertEquals('Evapotranspiració de referència', $entityResponse->getName());
        $this->assertEquals('mm', $entityResponse->getUnit());
        $this->assertEquals('ETo', $entityResponse->getAcronym());
        $this->assertEquals('CMV', $entityResponse->getType());
        $this->assertEquals(2, $entityResponse->getDecimals());

        /** @var array $intervals */
        $intervals = $entityResponse->getTemporalIntervals();
        $this->assertIsArray($intervals);
        $this->assertCount(1, $intervals);

        /** @var Entity\TemporalInterval $intervals1 */
        $intervals1 = current($intervals);
        $this->assertInstanceOf(Entity\TemporalInterval::class, $intervals1);
        $this->assertEquals('HO', $intervals1->getCode());
        $this->assertInstanceOf(DateTime::class, $intervals1->getDateStart());
        $this->assertEquals('1993-04-29 00:00:00', $intervals1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $intervals1->getDateEnd());
    }

    public function testMultivariableCalculationGetAll()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.cmv.metadades.json');

        /** @var MultivariableCalculation\GetAll $query */
        $query = new MultivariableCalculation\GetAll();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(1, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(6006, $variable1->getCode());
        $this->assertEquals('Evapotranspiració de referència', $variable1->getName());
        $this->assertEquals('mm', $variable1->getUnit());
        $this->assertEquals('ETo', $variable1->getAcronym());
        $this->assertEquals('CMV', $variable1->getType());
        $this->assertEquals(2, $variable1->getDecimals());
    }

    public function testMultivariableCalculationGetByVariable()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.cmv.6006.metadades.json');

        /** @var MultivariableCalculation\GetByVariable $query */
        $query = new MultivariableCalculation\GetByVariable(6006);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(6006, $entityResponse->getCode());
        $this->assertEquals('Evapotranspiració de referència', $entityResponse->getName());
        $this->assertEquals('mm', $entityResponse->getUnit());
        $this->assertEquals('ETo', $entityResponse->getAcronym());
        $this->assertEquals('CMV', $entityResponse->getType());
        $this->assertEquals(2, $entityResponse->getDecimals());
    }
}
