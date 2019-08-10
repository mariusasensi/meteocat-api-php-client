<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\XEMA\Auxiliary;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseXEMAAuxiliaryTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class ResponseXEMAAuxiliaryTest extends TestCase
{
    public function testAuxiliaryGetByFilters()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.auxiliars.900.2019.08.01.codiestacio.cu.json');

        /** @var Auxiliary\GetByFilters $query */
        $query = new Auxiliary\GetByFilters(900, 'CU', DateTime::createFromFormat('Y-m-d', '2019-08-01'));

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(900, $entityResponse->getCode());
        $this->assertEquals(null, $entityResponse->getName());
        $this->assertEquals(null, $entityResponse->getUnit());
        $this->assertEquals(null, $entityResponse->getAcronym());
        $this->assertEquals(null, $entityResponse->getType());
        $this->assertEquals(0, $entityResponse->getDecimals());

        $reads = $entityResponse->getReadings();
        $this->assertIsArray($reads);
        $this->assertCount(3, $reads);

        /** @var Entity\Read $read1 */
        $read1 = current($reads);
        $this->assertInstanceOf(Entity\Read::class, $read1);
        $this->assertInstanceOf(DateTime::class, $read1->getDate());
        $this->assertEquals('2019-08-01 01:00', $read1->getDate()->format('Y-m-d H:i'));
        $this->assertEquals(0.1, $read1->getValue());
        $this->assertEquals(' ', $read1->getStatus());
        $this->assertEquals('DM', $read1->getTimeBase());
    }

    public function testAuxiliaryGetMetadataByStation()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.auxiliars.metadades.estat.ope.data.2019-08-01z.json');

        /** @var Auxiliary\GetMetadataByStation $query */
        $query = new Auxiliary\GetMetadataByStation('CC');
        $query
            ->withDate(DateTime::createFromFormat('Y-m-d', '2019-08-01'))
            ->withState('ope');

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(2, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(900, $variable1->getCode());
        $this->assertEquals('Precipitació acumulada en 10 min', $variable1->getName());
        $this->assertEquals('mm', $variable1->getUnit());
        $this->assertEquals('PPT10min', $variable1->getAcronym());
        $this->assertEquals('AUX', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());

        /** @var array $variable1statuses */
        $variable1statuses = $variable1->getStatuses();
        $this->assertIsArray($variable1statuses);
        $this->assertCount(1, $variable1statuses);

        /** @var Entity\StationStatus $variable1statuses1 */
        $variable1statuses1 = current($variable1statuses);
        $this->assertInstanceOf(Entity\StationStatus::class, $variable1statuses1);
        $this->assertEquals(2, $variable1statuses1->getCode());
        $this->assertInstanceOf(DateTime::class, $variable1statuses1->getDateStart());
        $this->assertEquals('2007-07-01 20:00:00', $variable1statuses1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $variable1statuses1->getDateEnd());

        /** @var array $variable1intervals */
        $variable1intervals = $variable1->getTemporalIntervals();
        $this->assertIsArray($variable1intervals);
        $this->assertCount(1, $variable1intervals);

        /** @var Entity\TemporalInterval $variable1intervals1 */
        $variable1intervals1 = current($variable1intervals);
        $this->assertInstanceOf(Entity\TemporalInterval::class, $variable1intervals1);
        $this->assertEquals('DM', $variable1intervals1->getCode());
        $this->assertInstanceOf(DateTime::class, $variable1intervals1->getDateStart());
        $this->assertEquals('2007-07-01 20:00:00', $variable1intervals1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $variable1intervals1->getDateEnd());

        /** @var Entity\Variable $variable2 */
        $variable2 = next($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable2);
        $this->assertEquals(901, $variable2->getCode());
        $this->assertEquals('Precipitació acumulada en 1 min', $variable2->getName());
        $this->assertEquals('mm', $variable2->getUnit());
        $this->assertEquals('PPT1min', $variable2->getAcronym());
        $this->assertEquals('AUX', $variable2->getType());
        $this->assertEquals(1, $variable2->getDecimals());

        /** @var array $variable2statuses */
        $variable2statuses = $variable2->getStatuses();
        $this->assertIsArray($variable2statuses);
        $this->assertCount(1, $variable2statuses);

        /** @var Entity\StationStatus $variable2statuses1 */
        $variable2statuses1 = current($variable2statuses);
        $this->assertInstanceOf(Entity\StationStatus::class, $variable2statuses1);
        $this->assertEquals(2, $variable2statuses1->getCode());
        $this->assertInstanceOf(DateTime::class, $variable2statuses1->getDateStart());
        $this->assertEquals('2007-07-01 20:06:00', $variable2statuses1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $variable2statuses1->getDateEnd());

        /** @var array $variable2intervals */
        $variable2intervals = $variable2->getTemporalIntervals();
        $this->assertIsArray($variable2intervals);
        $this->assertCount(1, $variable2intervals);

        /** @var Entity\TemporalInterval $variable2intervals1 */
        $variable2intervals1 = current($variable2intervals);
        $this->assertInstanceOf(Entity\TemporalInterval::class, $variable2intervals1);
        $this->assertEquals('MI', $variable2intervals1->getCode());
        $this->assertInstanceOf(DateTime::class, $variable2intervals1->getDateStart());
        $this->assertEquals('2007-07-01 20:06:00', $variable2intervals1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $variable2intervals1->getDateEnd());
    }

    public function testAuxiliaryGetMetadataByFilters()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.auxiliars.900.metadades.json');

        /** @var Auxiliary\GetMetadataByFilters $query */
        $query = new Auxiliary\GetMetadataByFilters('CC', 900);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(900, $entityResponse->getCode());
        $this->assertEquals('Precipitació acumulada en 10 min', $entityResponse->getName());
        $this->assertEquals('mm', $entityResponse->getUnit());
        $this->assertEquals('PPT10min', $entityResponse->getAcronym());
        $this->assertEquals('AUX', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());

        /** @var array $statuses */
        $statuses = $entityResponse->getStatuses();
        $this->assertIsArray($statuses);
        $this->assertCount(1, $statuses);

        /** @var Entity\StationStatus $statuses1 */
        $statuses1 = current($statuses);
        $this->assertInstanceOf(Entity\StationStatus::class, $statuses1);
        $this->assertEquals(2, $statuses1->getCode());
        $this->assertInstanceOf(DateTime::class, $statuses1->getDateStart());
        $this->assertEquals('2007-07-01 20:00:00', $statuses1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $statuses1->getDateEnd());

        /** @var array $intervals */
        $intervals = $entityResponse->getTemporalIntervals();
        $this->assertIsArray($intervals);
        $this->assertCount(1, $intervals);

        /** @var Entity\TemporalInterval $intervals1 */
        $intervals1 = current($intervals);
        $this->assertInstanceOf(Entity\TemporalInterval::class, $intervals1);
        $this->assertEquals('DM', $intervals1->getCode());
        $this->assertInstanceOf(DateTime::class, $intervals1->getDateStart());
        $this->assertEquals('2007-07-01 20:00:00', $intervals1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $intervals1->getDateEnd());
    }

    public function testAuxiliaryGetAll()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.auxiliars.metadades.json');

        /** @var Auxiliary\GetAll $query */
        $query = new Auxiliary\GetAll();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(2, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(900, $variable1->getCode());
        $this->assertEquals('Precipitació acumulada en 10 min', $variable1->getName());
        $this->assertEquals('mm', $variable1->getUnit());
        $this->assertEquals('PPT10min', $variable1->getAcronym());
        $this->assertEquals('AUX', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());

        /** @var Entity\Variable $variable2 */
        $variable2 = next($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable2);
        $this->assertEquals(901, $variable2->getCode());
        $this->assertEquals('Precipitació acumulada en 1 min', $variable2->getName());
        $this->assertEquals('mm', $variable2->getUnit());
        $this->assertEquals('PPT1min', $variable2->getAcronym());
        $this->assertEquals('AUX', $variable2->getType());
        $this->assertEquals(1, $variable2->getDecimals());
    }

    public function testAuxiliaryGetByVariable()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.auxiliars.900.metadades.json');

        /** @var Auxiliary\GetByVariable $query */
        $query = new Auxiliary\GetByVariable(900);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        /** @var Entity\Variable $entityResponse */
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(900, $entityResponse->getCode());
        $this->assertEquals('Precipitació acumulada en 10 min', $entityResponse->getName());
        $this->assertEquals('mm', $entityResponse->getUnit());
        $this->assertEquals('PPT10min', $entityResponse->getAcronym());
        $this->assertEquals('AUX', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());
    }
}
