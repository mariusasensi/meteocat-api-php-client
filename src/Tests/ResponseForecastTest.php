<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\Forecast\Forecasting as Forecast;
use PHPUnit\Framework\TestCase;

class ResponseForecastTest extends TestCase
{
    public function testGetCatalunyaByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.catalunya.2019.08.06.json');

        /** @var Forecast\GetCatalunyaByDate $query */
        $query = new Forecast\GetCatalunyaByDate(DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetCountyByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.comarcal.2019.08.06.json');

        /** @var Forecast\GetCatalunyaByDate $query */
        $query = new Forecast\GetCountyByDate(DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetByCity()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.municipal.082444.json');

        /** @var Forecast\GetByCity $query */
        $query = new Forecast\GetByCity('082444');

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetCurrentWarnings()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.smp.episodis-oberts.json');

        /** @var Forecast\GetCurrentWarnings $query */
        $query = new Forecast\GetCurrentWarnings();

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetCurrentAlerts()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.smp.episodis-oberts.preavisos.json');

        /** @var Forecast\GetCurrentAlerts $query */
        $query = new Forecast\GetCurrentAlerts();

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetPyreneesMountainPeakMetadata()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.pics.metadades.json');

        /** @var Forecast\GetPyreneesMountainPeakMetadata $query */
        $query = new Forecast\GetPyreneesMountainPeakMetadata();

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetPyreneesMountainHuntMetadata()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.refugis.metadades.json');

        /** @var Forecast\GetPyreneesMountainHuntMetadata $query */
        $query = new Forecast\GetPyreneesMountainHuntMetadata();

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetPyreneesMountainPeakByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.pics.costabona.2019.08.06.json');

        /** @var Forecast\GetPyreneesMountainPeakByDate $query */
        $query = new Forecast\GetPyreneesMountainPeakByDate('costabona', DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetPyreneesMountainHuntByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.refugis.refugi-costabona.2019.08.06.json');

        /** @var Forecast\GetPyreneesMountainHuntByDate $query */
        $query = new Forecast\GetPyreneesMountainHuntByDate('refugi-costabona', DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetPyreneesZonesByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.2019.08.06.json');

        /** @var Forecast\GetPyreneesZonesByDate $query */
        $query = new Forecast\GetPyreneesZonesByDate(DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var mixed $entityResponse */
        //$entityResponse = Builder::create($query->getResponseClass(), $mockResponse);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testGetUltravioletIndexByCity()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.uvi.082444.json');

        /** @var Forecast\GetUltravioletIndexByCity $query */
        $query = new Forecast\GetUltravioletIndexByCity('082444');

        /** @var Entity\UltravioletIndex $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\UltravioletIndex::class, $entityResponse);

        /** @var Entity\City $city */
        $city = $entityResponse->getCity();
        $this->assertInstanceOf(Entity\City::class, $city);
        $this->assertEquals('082444', $city->getCode());
        $this->assertEquals('Santa Coloma de Cervelló', $city->getName());
        $this->assertEquals(null, $city->getCoordinate());
        $this->assertEquals([], $city->getLightningDischarges());
        $this->assertEquals(false, $city->isCapital());

        /** @var Entity\County $county */
        $county = $city->getCounty();
        $this->assertInstanceOf(Entity\County::class, $county);
        $this->assertEquals(11, $county->getCode());
        $this->assertEquals(null, $county->getName());

        /** @var array $uvi */
        $uvi = $entityResponse->getUvi();
        $this->assertIsArray($uvi);
        $this->assertCount(3, $uvi);

        /** @var Entity\UviDay $uvi1 */
        $uvi1 = current($uvi);
        $this->assertInstanceOf(Entity\UviDay::class, $uvi1);
        $this->assertInstanceOf(DateTime::class, $uvi1->getDate());
        $this->assertEquals('2019-08-05', $uvi1->getDate()->format('Y-m-d'));

        /** @var array $uvi1hours */
        $uvi1hours = $uvi1->getUviHours();
        $this->assertCount(24, $uvi1hours);

        /** @var Entity\UviHour $uvi1hours00 */
        $uvi1hours00 = $uvi1hours[0];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi1hours00);
        $this->assertEquals(0, $uvi1hours00->getHour());
        $this->assertEquals(0, $uvi1hours00->getUvi());
        $this->assertEquals(0, $uvi1hours00->getUviCloud());

        /** @var Entity\UviHour $uvi1hours14 */
        $uvi1hours14 = $uvi1hours[14];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi1hours14);
        $this->assertEquals(14, $uvi1hours14->getHour());
        $this->assertEquals(6, $uvi1hours14->getUvi());
        $this->assertEquals(6, $uvi1hours14->getUviCloud());

        /** @var Entity\UviHour $uvi1hours17 */
        $uvi1hours17 = $uvi1hours[17];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi1hours17);
        $this->assertEquals(17, $uvi1hours17->getHour());
        $this->assertEquals(1, $uvi1hours17->getUvi());
        $this->assertEquals(1, $uvi1hours17->getUviCloud());

        /** @var Entity\UviDay $uvi2 */
        $uvi2 = next($uvi);
        $this->assertInstanceOf(Entity\UviDay::class, $uvi2);
        $this->assertInstanceOf(DateTime::class, $uvi2->getDate());
        $this->assertEquals('2019-08-06', $uvi2->getDate()->format('Y-m-d'));

        /** @var array $uvi2hours */
        $uvi2hours = $uvi2->getUviHours();
        $this->assertCount(24, $uvi2hours);

        /** @var Entity\UviHour $uvi1hours01 */
        $uvi2hours01 = $uvi2hours[1];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi2hours01);
        $this->assertEquals(1, $uvi2hours01->getHour());
        $this->assertEquals(0, $uvi2hours01->getUvi());
        $this->assertEquals(0, $uvi2hours01->getUviCloud());

        /** @var Entity\UviHour $uvi2hours15 */
        $uvi2hours15 = $uvi2hours[15];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi2hours15);
        $this->assertEquals(15, $uvi2hours15->getHour());
        $this->assertEquals(4, $uvi2hours15->getUvi());
        $this->assertEquals(4, $uvi2hours15->getUviCloud());

        /** @var Entity\UviHour $uvi2hours18 */
        $uvi2hours18 = $uvi2hours[18];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi2hours18);
        $this->assertEquals(18, $uvi2hours18->getHour());
        $this->assertEquals(0, $uvi2hours18->getUvi());
        $this->assertEquals(0, $uvi2hours18->getUviCloud());

        /** @var Entity\UviDay $uvi3 */
        $uvi3 = next($uvi);
        $this->assertInstanceOf(Entity\UviDay::class, $uvi3);
        $this->assertInstanceOf(DateTime::class, $uvi3->getDate());
        $this->assertEquals('2019-08-07', $uvi3->getDate()->format('Y-m-d'));

        /** @var array $uvi3hours */
        $uvi3hours = $uvi3->getUviHours();
        $this->assertCount(24, $uvi3hours);

        /** @var Entity\UviHour $uvi3hours02 */
        $uvi3hours02 = $uvi3hours[2];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi3hours02);
        $this->assertEquals(2, $uvi3hours02->getHour());
        $this->assertEquals(0, $uvi3hours02->getUvi());
        $this->assertEquals(0, $uvi3hours02->getUviCloud());

        /** @var Entity\UviHour $uvi3hours13 */
        $uvi3hours13 = $uvi3hours[13];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi3hours13);
        $this->assertEquals(13, $uvi3hours13->getHour());
        $this->assertEquals(7, $uvi3hours13->getUvi());
        $this->assertEquals(2, $uvi3hours13->getUviCloud());

        /** @var Entity\UviHour $uvi3hours16 */
        $uvi3hours16 = $uvi3hours[16];
        $this->assertInstanceOf(Entity\UviHour::class, $uvi3hours16);
        $this->assertEquals(16, $uvi3hours16->getHour());
        $this->assertEquals(2, $uvi3hours16->getUvi());
        $this->assertEquals(0, $uvi3hours16->getUviCloud());
    }
}
