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
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.mesurades.32.2019.08.01.codiestacio.ug.json');

        /** @var Measurement\GetByDay $query */
        $query = new Measurement\GetByDay(32, DateTime::createFromFormat('Y-m-d H:i', '2019-08-01 00:00'));
        $query
            ->withStation('UG');

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(32, $entityResponse->getCode());
        $this->assertEquals(null, $entityResponse->getName());
        $this->assertEquals(null, $entityResponse->getUnit());
        $this->assertEquals(null, $entityResponse->getAcronym());
        $this->assertEquals(null, $entityResponse->getType());
        $this->assertEquals(0, $entityResponse->getDecimals());

        $reads = $entityResponse->getReadings();
        $this->assertIsArray($reads);
        $this->assertCount(48, $reads);

        /** @var Entity\Auxiliary\Read $read1 */
        $read1 = current($reads);
        $this->assertInstanceOf(Entity\Auxiliary\Read::class, $read1);
        $this->assertInstanceOf(DateTime::class, $read1->getDate());
        $this->assertEquals('2019-08-01 00:00', $read1->getDate()->format('Y-m-d H:i'));
        $this->assertEquals(21.6, $read1->getValue());
        $this->assertEquals('V', $read1->getStatus());
        $this->assertEquals('SH', $read1->getTimeBase());
    }

    public function testMeasurementGetLast()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.mesurades.5.ultimes.codiestacio.ug.json');

        /** @var Measurement\GetLast $query */
        $query = new Measurement\GetLast(5);
        $query
            ->withStation('UG');

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(5, $entityResponse->getCode());
        $this->assertEquals(null, $entityResponse->getName());
        $this->assertEquals(null, $entityResponse->getUnit());
        $this->assertEquals(null, $entityResponse->getAcronym());
        $this->assertEquals(null, $entityResponse->getType());
        $this->assertEquals(0, $entityResponse->getDecimals());

        $reads = $entityResponse->getReadings();
        $this->assertIsArray($reads);
        $this->assertCount(1, $reads);

        /** @var Entity\Auxiliary\Read $read1 */
        $read1 = current($reads);
        $this->assertInstanceOf(Entity\Auxiliary\Read::class, $read1);
        $this->assertInstanceOf(DateTime::class, $read1->getDate());
        $this->assertEquals('2019-08-09 22:00', $read1->getDate()->format('Y-m-d H:i'));
        $this->assertInstanceOf(DateTime::class, $read1->getDateExtreme());
        $this->assertEquals('2019-08-09 22:29', $read1->getDateExtreme()->format('Y-m-d H:i'));
        $this->assertEquals(27.5, $read1->getValue());
        $this->assertEquals(' ', $read1->getStatus());
        $this->assertEquals('SH', $read1->getTimeBase());
    }

    public function testMeasurementGetAllByStation()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.metadades.estat.ope.data.2019-08-01z.json');

        /** @var Measurement\GetAllByStation $query */
        $query = new Measurement\GetAllByStation('UG');
        $query
            ->withDate(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withState('ope');

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(22, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(3, $variable1->getCode());
        $this->assertEquals('Humitat relativa màxima', $variable1->getName());
        $this->assertEquals('%', $variable1->getUnit());
        $this->assertEquals('HRx', $variable1->getAcronym());
        $this->assertEquals('DAT', $variable1->getType());
        $this->assertEquals(0, $variable1->getDecimals());

        /** @var array $variable1statuses */
        $variable1statuses = $variable1->getStatuses();
        $this->assertIsArray($variable1statuses);
        $this->assertCount(1, $variable1statuses);

        /** @var Entity\Auxiliary\StationStatus $variable1statuses1 */
        $variable1statuses1 = current($variable1statuses);
        $this->assertInstanceOf(Entity\Auxiliary\StationStatus::class, $variable1statuses1);
        $this->assertEquals(2, $variable1statuses1->getCode());
        $this->assertInstanceOf(DateTime::class, $variable1statuses1->getDateStart());
        $this->assertEquals('2009-07-15 09:00:00', $variable1statuses1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $variable1statuses1->getDateEnd());

        /** @var array $variable1intervals */
        $variable1intervals = $variable1->getTemporalIntervals();
        $this->assertIsArray($variable1intervals);
        $this->assertCount(2, $variable1intervals);

        /** @var Entity\Auxiliary\TemporalInterval $variable1intervals1 */
        $variable1intervals1 = current($variable1intervals);
        $this->assertInstanceOf(Entity\Auxiliary\TemporalInterval::class, $variable1intervals1);
        $this->assertEquals('HO', $variable1intervals1->getCode());
        $this->assertInstanceOf(DateTime::class, $variable1intervals1->getDateStart());
        $this->assertEquals('2009-07-15 09:00:00', $variable1intervals1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertInstanceOf(DateTime::class, $variable1intervals1->getDateEnd());
        $this->assertEquals('2014-04-02 00:00:00', $variable1intervals1->getDateEnd()->format('Y-m-d H:i:s'));

        /** @var Entity\Auxiliary\TemporalInterval $variable1intervals2 */
        $variable1intervals2 = next($variable1intervals);
        $this->assertInstanceOf(Entity\Auxiliary\TemporalInterval::class, $variable1intervals2);
        $this->assertEquals('SH', $variable1intervals2->getCode());
        $this->assertInstanceOf(DateTime::class, $variable1intervals2->getDateStart());
        $this->assertEquals('2014-04-02 00:00:00', $variable1intervals2->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $variable1intervals2->getDateEnd());
    }

    public function testMeasurementGetByStation()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.ug.variables.mesurades.3.metadades.json');

        /** @var Measurement\GetByStation $query */
        $query = new Measurement\GetByStation('UG', 3);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(3, $entityResponse->getCode());
        $this->assertEquals('Humitat relativa màxima', $entityResponse->getName());
        $this->assertEquals('%', $entityResponse->getUnit());
        $this->assertEquals('HRx', $entityResponse->getAcronym());
        $this->assertEquals('DAT', $entityResponse->getType());
        $this->assertEquals(0, $entityResponse->getDecimals());

        /** @var array $statuses */
        $statuses = $entityResponse->getStatuses();
        $this->assertIsArray($statuses);
        $this->assertCount(1, $statuses);

        /** @var Entity\Auxiliary\StationStatus $statuses1 */
        $statuses1 = current($statuses);
        $this->assertInstanceOf(Entity\Auxiliary\StationStatus::class, $statuses1);
        $this->assertEquals(2, $statuses1->getCode());
        $this->assertInstanceOf(DateTime::class, $statuses1->getDateStart());
        $this->assertEquals('2009-07-15 09:00:00', $statuses1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $statuses1->getDateEnd());

        /** @var array $intervals */
        $intervals = $entityResponse->getTemporalIntervals();
        $this->assertIsArray($intervals);
        $this->assertCount(2, $intervals);

        /** @var Entity\Auxiliary\TemporalInterval $intervals1 */
        $intervals1 = current($intervals);
        $this->assertInstanceOf(Entity\Auxiliary\TemporalInterval::class, $intervals1);
        $this->assertEquals('HO', $intervals1->getCode());
        $this->assertInstanceOf(DateTime::class, $intervals1->getDateStart());
        $this->assertEquals('2009-07-15 09:00:00', $intervals1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertInstanceOf(DateTime::class, $intervals1->getDateEnd());
        $this->assertEquals('2014-04-02 00:00:00', $intervals1->getDateEnd()->format('Y-m-d H:i:s'));

        /** @var Entity\Auxiliary\TemporalInterval $intervals2 */
        $intervals2 = next($intervals);
        $this->assertInstanceOf(Entity\Auxiliary\TemporalInterval::class, $intervals2);
        $this->assertEquals('SH', $intervals2->getCode());
        $this->assertInstanceOf(DateTime::class, $intervals2->getDateStart());
        $this->assertEquals('2014-04-02 00:00:00', $intervals2->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $intervals2->getDateEnd());
    }

    public function testMeasurementGetAll()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.mesurades.metadades.json');

        /** @var Measurement\GetAll $query */
        $query = new Measurement\GetAll();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(85, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(1, $variable1->getCode());
        $this->assertEquals('Pressió atmosfèrica màxima', $variable1->getName());
        $this->assertEquals('hPa', $variable1->getUnit());
        $this->assertEquals('Px', $variable1->getAcronym());
        $this->assertEquals('DAT', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());

        /** @var Entity\Variable $variable2 */
        $variable2 = next($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable2);
        $this->assertEquals(2, $variable2->getCode());
        $this->assertEquals('Pressió atmosfèrica mínima', $variable2->getName());
        $this->assertEquals('hPa', $variable2->getUnit());
        $this->assertEquals('Pn', $variable2->getAcronym());
        $this->assertEquals('DAT', $variable2->getType());
        $this->assertEquals(1, $variable2->getDecimals());
    }

    public function testMeasurementGetUnique()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.mesurades.1.metadades.json');

        /** @var Measurement\GetUnique $query */
        $query = new Measurement\GetUnique(1);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        /** @var Entity\Variable $entityResponse */
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(1, $entityResponse->getCode());
        $this->assertEquals('Pressió atmosfèrica màxima', $entityResponse->getName());
        $this->assertEquals('hPa', $entityResponse->getUnit());
        $this->assertEquals('Px', $entityResponse->getAcronym());
        $this->assertEquals('DAT', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());
    }
}
