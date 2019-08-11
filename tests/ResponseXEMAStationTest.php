<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\XEMA\Station;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseXEMA
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class ResponseXEMAStationTest extends TestCase
{
    public function testStationGetAll()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.metadades.estat.ope.data.2019-08-01z.json');

        $query = new Station\GetAll();
        $query
            ->withDate(DateTime::createFromFormat('Y-m-d H:i', '2019-08-01 00:00'))
            ->withState('ope');

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(189, $entityResponse);

        /** @var Entity\Station $station1 */
        $station1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Station::class, $station1);
        $this->assertEquals('C6', $station1->getCode());
        $this->assertEquals('Castellnou de Seana', $station1->getName());
        $this->assertEquals('A', $station1->getType());
        $this->assertEquals('Abocador comarcal', $station1->getSite());
        $this->assertEquals(264, $station1->getAltitude());

        /** @var Entity\City $station1city */
        $station1city = $station1->getCity();
        $this->assertInstanceOf(Entity\City::class, $station1city);
        $this->assertEquals('250680', $station1city->getCode());
        $this->assertEquals('Castellnou de Seana', $station1city->getName());
        $this->assertEquals([], $station1city->getLightningDischarges());
        $this->assertEquals(null, $station1city->isCapital());

        /** @var Entity\Auxiliary\Coordinate $station1Coordinate */
        $station1Coordinate = $station1->getCoordinate();
        $this->assertInstanceOf(Entity\Auxiliary\Coordinate::class, $station1Coordinate);
        $this->assertEquals(41.6566, $station1Coordinate->getLatitude());
        $this->assertEquals(0.95172, $station1Coordinate->getLongitude());

        /** @var Entity\County $station1County */
        $station1County = $station1->getCounty();
        $this->assertInstanceOf(Entity\County::class, $station1County);
        $this->assertEquals(27, $station1County->getCode());
        $this->assertEquals('Pla d\'Urgell', $station1County->getName());

        /** @var Entity\County $station1Region */
        $station1Region = $station1->getRegion();
        $this->assertInstanceOf(Entity\Auxiliary\Region::class, $station1Region);
        $this->assertEquals(25, $station1Region->getCode());
        $this->assertEquals('Lleida', $station1Region->getName());

        /** @var Entity\Auxiliary\StationNetwork $station1Network */
        $station1Network = $station1->getNetwork();
        $this->assertInstanceOf(Entity\Auxiliary\StationNetwork::class, $station1Network);
        $this->assertEquals(1, $station1Network->getCode());
        $this->assertEquals('XEMA', $station1Network->getName());

        /** @var array $station1Statuses */
        $station1Statuses = $station1->getStatuses();
        $this->assertIsArray($station1Statuses);
        $this->assertCount(1, $station1Statuses);

        /** @var Entity\Auxiliary\StationStatus $station1Statuses1 */
        $station1Statuses1 = current($station1Statuses);
        $this->assertInstanceOf(Entity\Auxiliary\StationStatus::class, $station1Statuses1);
        $this->assertEquals(2, $station1Statuses1->getCode());
        $this->assertInstanceOf(DateTime::class, $station1Statuses1->getDateStart());
        $this->assertEquals('1995-12-16 23:00:00', $station1Statuses1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $station1Statuses1->getDateEnd());
    }

    public function testStationGetUnique()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.ug.metadades.json');

        $query = new Station\GetUnique('UG');

        /** @var Entity\Station $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        /** @var Entity\Station $entityResponse */
        $this->assertInstanceOf(Entity\Station::class, $entityResponse);
        $this->assertEquals('UG', $entityResponse->getCode());
        $this->assertEquals('Viladecans', $entityResponse->getName());
        $this->assertEquals('A', $entityResponse->getType());
        $this->assertEquals('Planters Gusi, ctra. antiga de València, km 14', $entityResponse->getSite());
        $this->assertEquals(3, $entityResponse->getAltitude());

        /** @var Entity\City $stationCity */
        $stationCity = $entityResponse->getCity();
        $this->assertInstanceOf(Entity\City::class, $stationCity);
        $this->assertEquals('083015', $stationCity->getCode());
        $this->assertEquals('Viladecans', $stationCity->getName());
        $this->assertEquals([], $stationCity->getLightningDischarges());
        $this->assertEquals(null, $stationCity->isCapital());

        /** @var Entity\Auxiliary\Coordinate $stationCoordinate */
        $stationCoordinate = $entityResponse->getCoordinate();
        $this->assertInstanceOf(Entity\Auxiliary\Coordinate::class, $stationCoordinate);
        $this->assertEquals(41.29928, $stationCoordinate->getLatitude());
        $this->assertEquals(2.03787, $stationCoordinate->getLongitude());

        /** @var Entity\County $stationCounty */
        $stationCounty = $entityResponse->getCounty();
        $this->assertInstanceOf(Entity\County::class, $stationCounty);
        $this->assertEquals(11, $stationCounty->getCode());
        $this->assertEquals('Baix Llobregat', $stationCounty->getName());

        /** @var Entity\County $stationRegion */
        $stationRegion = $entityResponse->getRegion();
        $this->assertInstanceOf(Entity\Auxiliary\Region::class, $stationRegion);
        $this->assertEquals(8, $stationRegion->getCode());
        $this->assertEquals('Barcelona', $stationRegion->getName());

        /** @var Entity\Auxiliary\StationNetwork $stationNetwork */
        $stationNetwork = $entityResponse->getNetwork();
        $this->assertInstanceOf(Entity\Auxiliary\StationNetwork::class, $stationNetwork);
        $this->assertEquals(1, $stationNetwork->getCode());
        $this->assertEquals('XEMA', $stationNetwork->getName());

        /** @var array $stationStatuses */
        $stationStatuses = $entityResponse->getStatuses();
        $this->assertIsArray($stationStatuses);
        $this->assertCount(1, $stationStatuses);

        /** @var Entity\Auxiliary\StationStatus $stationStatuses1 */
        $stationStatuses1 = current($stationStatuses);
        $this->assertInstanceOf(Entity\Auxiliary\StationStatus::class, $stationStatuses1);
        $this->assertEquals(2, $stationStatuses1->getCode());
        $this->assertInstanceOf(DateTime::class, $stationStatuses1->getDateStart());
        $this->assertEquals('1993-04-29 00:00:00', $stationStatuses1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertEquals(null, $stationStatuses1->getDateEnd());
    }
}
