<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\XEMA\Representative;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseXEMA
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class ResponseXEMARepresentativeTest extends TestCase
{
    public function testRepresentativeGetStationByCity()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.representatives.metadades.municipis.082444.variables.32.json');

        /** @var Representative\GetStationByCity $query */
        $query = new Representative\GetStationByCity('082444', 32);

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(1, $entityResponse);

        /** @var Entity\City $city */
        $city = current($entityResponse);
        $this->assertInstanceOf(Entity\City::class, $city);
        $this->assertEquals('082444', $city->getCode());

        /** @var array $cityRepresentative */
        $cityRepresentative = $city->getRepresentativeStations();
        $this->assertIsArray($cityRepresentative);
        $this->assertCount(1, $cityRepresentative);

        /** @var Entity\VariableCity $cityRepresentativeVariable */
        $cityRepresentativeVariable = current($cityRepresentative);
        $this->assertInstanceOf(Entity\VariableCity::class, $cityRepresentativeVariable);
        $this->assertInstanceOf(Entity\Variable::class, $cityRepresentativeVariable->getVariable());
        $this->assertEquals(32, $cityRepresentativeVariable->getVariable()->getCode());

        /** @var array $cityRepresentativeVariableStations */
        $cityRepresentativeVariableStations = $cityRepresentativeVariable->getStations();
        $this->assertIsArray($cityRepresentativeVariableStations);
        $this->assertCount(2, $cityRepresentativeVariableStations);

        /** @var Entity\Station $cityRepresentativeVariableStations1 */
        $cityRepresentativeVariableStations1 = current($cityRepresentativeVariableStations);
        $this->assertInstanceOf(Entity\Station::class, $cityRepresentativeVariableStations1);
        $this->assertEquals('XL', $cityRepresentativeVariableStations1->getCode());
        $this->assertEquals(1, $cityRepresentativeVariableStations1->getOrder());

        /** @var Entity\Station $cityRepresentativeVariableStations2 */
        $cityRepresentativeVariableStations2 = next($cityRepresentativeVariableStations);
        $this->assertInstanceOf(Entity\Station::class, $cityRepresentativeVariableStations2);
        $this->assertEquals('UG', $cityRepresentativeVariableStations2->getCode());
        $this->assertEquals(2, $cityRepresentativeVariableStations2->getOrder());
    }

    public function testRepresentativeGetAllVariableMetadata()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.representatives.metadades.variables.json');

        /** @var Representative\GetAllVariableMetadata $query */
        $query = new Representative\GetAllVariableMetadata();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(1, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(32, $variable1->getCode());
        $this->assertEquals('Temperatura', $variable1->getName());
        $this->assertEquals('°C', $variable1->getUnit());
        $this->assertEquals('T', $variable1->getAcronym());
        $this->assertEquals('DAT', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());
    }
}
