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
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.anuals.3000.codiestacio.ug.json');

        /** @var Statistic\GetYearlyByVariable $query */
        $query = new Statistic\GetYearlyByVariable(3000);
        $query->withStation('UG');

        /** @var Entity\Statistic $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Statistic::class, $entityResponse);

        /** @var Entity\Station $station */
        $station = $entityResponse->getStation();
        $this->assertInstanceOf(Entity\Station::class, $station);
        $this->assertEquals('UG', $station->getCode());

        /** @var Entity\Variable::class $variable */
        $variable = $entityResponse->getVariable();
        $this->assertInstanceOf(Entity\Variable::class, $variable);
        $this->assertEquals(3000, $variable->getCode());
        $this->assertEquals(null, $variable->getName());
        $this->assertEquals(null, $variable->getUnit());
        $this->assertEquals(null, $variable->getAcronym());
        $this->assertEquals(null, $variable->getType());
        $this->assertEquals(0, $variable->getDecimals());

        /** @var array $reads */
        $reads = $entityResponse->getValues();
        $this->assertIsArray($reads);
        $this->assertCount(5, $reads);

        /** @var Entity\Read $read1 */
        $read1 = current($reads);
        $this->assertInstanceOf(Entity\Read::class, $read1);
        $this->assertInstanceOf(DateTime::class, $read1->getDate());
        $this->assertEquals('2013', $read1->getDate()->format('Y'));
        $this->assertEquals(16.2, $read1->getValue());
        $this->assertEquals(100, $read1->getPercentage());
    }

    public function testStatisticGetMonthlyByVariable()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.mensuals.2000.codiestacio.ug.any.2018.json');

        /** @var Statistic\GetMonthlyByVariable $query */
        $query = new Statistic\GetMonthlyByVariable(2000, DateTime::createFromFormat('y', '18'));
        $query->withStation('UG');

        /** @var Entity\Statistic $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Statistic::class, $entityResponse);

        /** @var Entity\Station $station */
        $station = $entityResponse->getStation();
        $this->assertInstanceOf(Entity\Station::class, $station);
        $this->assertEquals('UG', $station->getCode());

        /** @var Entity\Variable::class $variable */
        $variable = $entityResponse->getVariable();
        $this->assertInstanceOf(Entity\Variable::class, $variable);
        $this->assertEquals(2000, $variable->getCode());
        $this->assertEquals(null, $variable->getName());
        $this->assertEquals(null, $variable->getUnit());
        $this->assertEquals(null, $variable->getAcronym());
        $this->assertEquals(null, $variable->getType());
        $this->assertEquals(0, $variable->getDecimals());

        /** @var array $reads */
        $reads = $entityResponse->getValues();
        $this->assertIsArray($reads);
        $this->assertCount(12, $reads);

        /** @var Entity\Read $read1 */
        $read1 = current($reads);
        $this->assertInstanceOf(Entity\Read::class, $read1);
        $this->assertInstanceOf(DateTime::class, $read1->getDate());
        $this->assertEquals('2018-01', $read1->getDate()->format('Y-m'));
        $this->assertEquals(11.3, $read1->getValue());
        $this->assertEquals(100, $read1->getPercentage());
    }

    public function testStatisticGetDailyByVariable()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.diaris.1001.codiestacio.ug.any.2019.mes.07.json');

        /** @var Statistic\GetDailyByVariable $query */
        $query = new Statistic\GetDailyByVariable(1001, DateTime::createFromFormat('y-m', '19-07'));
        $query->withStation('UG');

        /** @var Entity\Statistic $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Statistic::class, $entityResponse);

        /** @var Entity\Station $station */
        $station = $entityResponse->getStation();
        $this->assertInstanceOf(Entity\Station::class, $station);
        $this->assertEquals('UG', $station->getCode());

        /** @var Entity\Variable::class $variable */
        $variable = $entityResponse->getVariable();
        $this->assertInstanceOf(Entity\Variable::class, $variable);
        $this->assertEquals(1001, $variable->getCode());
        $this->assertEquals(null, $variable->getName());
        $this->assertEquals(null, $variable->getUnit());
        $this->assertEquals(null, $variable->getAcronym());
        $this->assertEquals(null, $variable->getType());
        $this->assertEquals(0, $variable->getDecimals());

        /** @var array $reads */
        $reads = $entityResponse->getValues();
        $this->assertIsArray($reads);
        $this->assertCount(31, $reads);

        /** @var Entity\Read $read1 */
        $read1 = current($reads);
        $this->assertInstanceOf(Entity\Read::class, $read1);
        $this->assertInstanceOf(DateTime::class, $read1->getDate());
        $this->assertInstanceOf(DateTime::class, $read1->getDateExtreme());
        $this->assertEquals('2019-07-01', $read1->getDate()->format('Y-m-d'));
        $this->assertEquals('2019-07-01 13:26', $read1->getDateExtreme()->format('Y-m-d H:i'));
        $this->assertEquals(29.4, $read1->getValue());
        $this->assertEquals(100, $read1->getPercentage());
    }

    public function testStatisticGetYearlyMetadata()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.anuals.metadades.json');

        /** @var Statistic\GetYearlyMetadata $query */
        $query = new Statistic\GetYearlyMetadata();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(37, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(3000, $variable1->getCode());
        $this->assertEquals('Temperatura mitjana anual', $variable1->getName());
        $this->assertEquals('°C', $variable1->getUnit());
        $this->assertEquals('TMM', $variable1->getAcronym());
        $this->assertEquals('AN', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());
    }

    public function testStatisticGetYearlyMetadataByVariable()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.anuals.3001.metadades.json');

        /** @var Statistic\GetYearlyMetadataByVariable $query */
        $query = new Statistic\GetYearlyMetadataByVariable(3001);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(3001, $entityResponse->getCode());
        $this->assertEquals('Temperatura màxima abs. anual + data', $entityResponse->getName());
        $this->assertEquals('°C', $entityResponse->getUnit());
        $this->assertEquals('TXX', $entityResponse->getAcronym());
        $this->assertEquals('AN', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());
    }

    public function testStatisticGetMonthlyMetadata()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.mensuals.metadades.json');

        /** @var Statistic\GetMonthlyMetadata $query */
        $query = new Statistic\GetMonthlyMetadata();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(37, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(2000, $variable1->getCode());
        $this->assertEquals('Temperatura mitjana mensual', $variable1->getName());
        $this->assertEquals('°C', $variable1->getUnit());
        $this->assertEquals('TMm', $variable1->getAcronym());
        $this->assertEquals('EM', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());
    }

    public function testStatisticGetMonthlyMetadataByVariable()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.mensuals.2001.metadades.json');

        /** @var Statistic\GetMonthlyMetadataByVariable $query */
        $query = new Statistic\GetMonthlyMetadataByVariable(2001);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(2001, $entityResponse->getCode());
        $this->assertEquals('Temperatura màxima absoluta mensual + data', $entityResponse->getName());
        $this->assertEquals('°C', $entityResponse->getUnit());
        $this->assertEquals('TXx', $entityResponse->getAcronym());
        $this->assertEquals('EM', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());
    }

    public function testStatisticGetDailyMetadata()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.diaris.metadades.json');

        /** @var Statistic\GetDailyMetadata $query */
        $query = new Statistic\GetDailyMetadata();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(26, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(1000, $variable1->getCode());
        $this->assertEquals('Temperatura mitjana diària', $variable1->getName());
        $this->assertEquals('°C', $variable1->getUnit());
        $this->assertEquals('TM', $variable1->getAcronym());
        $this->assertEquals('AD', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());
    }

    public function testStatisticGetDailyMetadataByVariable()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.variables.estadistics.diaris.1001.metadades.json');

        /** @var Statistic\GetDailyMetadataByVariable $query */
        $query = new Statistic\GetDailyMetadataByVariable(1001);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(1001, $entityResponse->getCode());
        $this->assertEquals('Temperatura màxima diària + hora', $entityResponse->getName());
        $this->assertEquals('°C', $entityResponse->getUnit());
        $this->assertEquals('TX', $entityResponse->getAcronym());
        $this->assertEquals('AD', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());
    }

    public function testStatisticGetYearlyMetadataByStation()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.anuals.metadades.json');

        /** @var Statistic\GetYearlyMetadataByStation $query */
        $query = new Statistic\GetYearlyMetadataByStation('CC');

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(25, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(3000, $variable1->getCode());
        $this->assertEquals('Temperatura mitjana anual', $variable1->getName());
        $this->assertEquals('°C', $variable1->getUnit());
        $this->assertEquals('TMM', $variable1->getAcronym());
        $this->assertEquals('AN', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());
    }

    public function testStatisticGetYearlyMetadataByFilters()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.anuals.3000.metadades.json');

        /** @var Statistic\GetYearlyMetadataByFilters $query */
        $query = new Statistic\GetYearlyMetadataByFilters('CC', 3000);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(3000, $entityResponse->getCode());
        $this->assertEquals('Temperatura mitjana anual', $entityResponse->getName());
        $this->assertEquals('°C', $entityResponse->getUnit());
        $this->assertEquals('TMM', $entityResponse->getAcronym());
        $this->assertEquals('AN', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());
    }

    public function testStatisticGetMonthlyMetadataByStation()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.mensuals.metadades.json');

        /** @var Statistic\GetMonthlyMetadataByStation $query */
        $query = new Statistic\GetMonthlyMetadataByStation('CC');

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(25, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(2000, $variable1->getCode());
        $this->assertEquals('Temperatura mitjana mensual', $variable1->getName());
        $this->assertEquals('°C', $variable1->getUnit());
        $this->assertEquals('TMm', $variable1->getAcronym());
        $this->assertEquals('EM', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());
    }

    public function testStatisticGetMonthlyMetadataByFilters()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.mensuals.2000.metadades.json');

        /** @var Statistic\GetMonthlyMetadataByFilters $query */
        $query = new Statistic\GetMonthlyMetadataByFilters('CC', 2000);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(2000, $entityResponse->getCode());
        $this->assertEquals('Temperatura mitjana mensual', $entityResponse->getName());
        $this->assertEquals('°C', $entityResponse->getUnit());
        $this->assertEquals('TMm', $entityResponse->getAcronym());
        $this->assertEquals('EM', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());
    }

    public function testStatisticGetDailyMetadataByStation()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.diaris.metadades.json');

        /** @var Statistic\GetDailyMetadataByStation $query */
        $query = new Statistic\GetDailyMetadataByStation('CC');

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(17, $entityResponse);

        /** @var Entity\Variable $variable1 */
        $variable1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Variable::class, $variable1);
        $this->assertEquals(1000, $variable1->getCode());
        $this->assertEquals('Temperatura mitjana diària', $variable1->getName());
        $this->assertEquals('°C', $variable1->getUnit());
        $this->assertEquals('TM', $variable1->getAcronym());
        $this->assertEquals('AD', $variable1->getType());
        $this->assertEquals(1, $variable1->getDecimals());
    }

    public function testStatisticGetDailyMetadataByFilters()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.xema.v1.estacions.cc.variables.estadistics.diaris.1000.metadades.json');

        /** @var Statistic\GetDailyMetadataByFilters $query */
        $query = new Statistic\GetDailyMetadataByFilters('CC', 1000);

        /** @var Entity\Variable $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Variable::class, $entityResponse);
        $this->assertEquals(1000, $entityResponse->getCode());
        $this->assertEquals('Temperatura mitjana diària', $entityResponse->getName());
        $this->assertEquals('°C', $entityResponse->getUnit());
        $this->assertEquals('TM', $entityResponse->getAcronym());
        $this->assertEquals('AD', $entityResponse->getType());
        $this->assertEquals(1, $entityResponse->getDecimals());
    }
}
