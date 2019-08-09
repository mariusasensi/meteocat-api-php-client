<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\XDDE\Lightning;
use PHPUnit\Framework\TestCase;

class ResponseXDDETest extends TestCase
{
    function testLightningGetOfCatalunyaByDateTime()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xdde.v1.catalunya.2019.08.04.16.json');

        $query = new Lightning\GetOfCatalunyaByDateTime(DateTime::createFromFormat('Y-m-d H', '2019-08-04 16'));
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);

        /** @var Entity\Lightning $lightning1 */
        $lightning1 = current($entityResponse);
        $this->assertEquals(19001267, $lightning1->getId());
        $this->assertInstanceOf(DateTime::class, $lightning1->getDate());
        $this->assertEquals('2019-08-04 16:02:26', $lightning1->getDate()->format('Y-m-d H:i:s'));
        $this->assertEquals(5.994, $lightning1->getIntensity());
        $this->assertEquals(0.5, $lightning1->getChiSquared());
        $this->assertEquals(2, $lightning1->getSensorsCount());
        $this->assertEquals(true, $lightning1->isCloudGround());

        /** @var Entity\City $lightning1City */
        $lightning1City = $lightning1->getCity();
        $this->assertInstanceOf(Entity\City::class, $lightning1City);
        $this->assertEquals('251462', $lightning1City->getCode());
        $this->assertEquals(null, $lightning1City->getName());
        $this->assertEquals([], $lightning1City->getLightningDischarges());
        $this->assertEquals(null, $lightning1City->getCounty());
        $this->assertEquals(null, $lightning1City->getCoordinate());

        /** @var Entity\Coordinate $lightning1Coordinate */
        $lightning1Coordinate = $lightning1->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $lightning1Coordinate);
        $this->assertEquals(42.03649, $lightning1Coordinate->getLatitude());
        $this->assertEquals(1.672512, $lightning1Coordinate->getLongitude());

        /** @var Entity\Ellipse $lightning1Ellipse */
        $lightning1Ellipse = $lightning1->getEllipse();
        $this->assertInstanceOf(Entity\Ellipse::class, $lightning1Ellipse);
        $this->assertEquals(1500, $lightning1Ellipse->getMajorAxis());
        $this->assertEquals(400, $lightning1Ellipse->getMinorAxis());
        $this->assertEquals(313.89999, $lightning1Ellipse->getAngle());

        /** @var Entity\Lightning $lightning2 */
        $lightning2 = next($entityResponse);
        $this->assertEquals(19001373, $lightning2->getId());
        $this->assertInstanceOf(DateTime::class, $lightning2->getDate());
        $this->assertEquals('2019-08-04 16:05:25', $lightning2->getDate()->format('Y-m-d H:i:s'));
        $this->assertEquals(84.655998, $lightning2->getIntensity());
        $this->assertEquals(1.8, $lightning2->getChiSquared());
        $this->assertEquals(4, $lightning2->getSensorsCount());
        $this->assertEquals(true, $lightning2->isCloudGround());

        /** @var Entity\City $lightning2City */
        $lightning2City = $lightning1->getCity();
        $this->assertInstanceOf(Entity\City::class, $lightning2City);
        $this->assertEquals('251462', $lightning2City->getCode());
        $this->assertEquals(null, $lightning2City->getName());
        $this->assertEquals([], $lightning2City->getLightningDischarges());
        $this->assertEquals(null, $lightning2City->getCounty());
        $this->assertEquals(null, $lightning2City->getCoordinate());

        /** @var Entity\Coordinate $lightning2Coordinate */
        $lightning2Coordinate = $lightning2->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $lightning2Coordinate);
        $this->assertEquals(42.00192, $lightning2Coordinate->getLatitude());
        $this->assertEquals(1.632251, $lightning2Coordinate->getLongitude());

        /** @var Entity\Ellipse $lightning2Ellipse */
        $lightning2Ellipse = $lightning2->getEllipse();
        $this->assertInstanceOf(Entity\Ellipse::class, $lightning2Ellipse);
        $this->assertEquals(300, $lightning2Ellipse->getMajorAxis());
        $this->assertEquals(200, $lightning2Ellipse->getMinorAxis());
        $this->assertEquals(355.20001, $lightning2Ellipse->getAngle());
    }

    public function testLightningGetOfCountyByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xdde.v1.informes.comarques.14.2019.08.04.json');

        $query = new Lightning\GetOfCountyByDate(14, DateTime::createFromFormat('Y-m-d', '2019-08-04'));
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);

        /** @var Entity\City $city1 */
        $city1 = current($entityResponse);
        $this->assertInstanceOf(Entity\City::class, $city1);
        $this->assertEquals('080116', $city1->getCode());
        $this->assertEquals('Avià', $city1->getName());
        $this->assertNull($city1->getCoordinate());
        $this->assertNull($city1->getCounty());

        /** @var array $lightningDischarges */
        $lightningDischarges = $city1->getLightningDischarges();
        $this->assertIsArray($city1->getLightningDischarges());
        $this->assertCount(1, $lightningDischarges);

        /** @var Entity\LightningDischarge $uniqueDischarge */
        $uniqueDischarge = current($lightningDischarges);
        $this->assertEquals('cc', $uniqueDischarge->getType());
        $this->assertEquals(5, $uniqueDischarge->getCount());
    }
}
