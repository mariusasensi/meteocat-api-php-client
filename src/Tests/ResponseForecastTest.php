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

        /** @var Entity\Forecast $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Forecast::class, $entityResponse);

        /** @var Entity\ForecastPart $morning */
        $morning = $entityResponse->getMorning();
        $this->assertInstanceOf(Entity\ForecastPart::class, $morning);

        /** @var array $morningTendencies */
        $morningTendencies = $morning->getTendency();
        $this->assertIsArray($morningTendencies);
        $this->assertCount(1, $morningTendencies);

        /** @var Entity\ForecastTendency $morningTendency */
        $morningTendency = current($morningTendencies);
        $this->assertInstanceOf(Entity\ForecastTendency::class, $morningTendency);
        $this->assertEquals('tn', $morningTendency->getType());
        $this->assertEquals(0, $morningTendency->getValue());

        /** @var Entity\ForecastSymbol $morningSymbols */
        $morningSymbols = $morning->getSymbol();
        $this->assertInstanceOf(Entity\ForecastSymbol::class, $morningSymbols);

        /** @var array $morningSymbolsSky */
        $morningSymbolsSky = $morningSymbols->getSky();
        $this->assertIsArray($morningSymbolsSky);
        $this->assertCount(17, $morningSymbolsSky); // ?

        /** @var Entity\ForecastSymbolCommon $morningSymbolSky16 */
        $morningSymbolSky16 = $morningSymbolsSky[16];
        $this->assertInstanceOf(Entity\ForecastSymbolCommon::class, $morningSymbolSky16);

        /** @var Entity\SymbolValue $morningSymbolSky16Symbol */
        $morningSymbolSky16Symbol = $morningSymbolSky16->getSymbol();
        $this->assertInstanceOf(Entity\SymbolValue::class, $morningSymbolSky16Symbol);
        $this->assertEquals('1', $morningSymbolSky16Symbol->getCode());
        $this->assertEquals(null, $morningSymbolSky16Symbol->getName());
        $this->assertEquals(null, $morningSymbolSky16Symbol->getCategory());
        $this->assertEquals(null, $morningSymbolSky16Symbol->getDescription());
        $this->assertEquals(null, $morningSymbolSky16Symbol->getUrlIcon());
        $this->assertEquals(null, $morningSymbolSky16Symbol->getUrlIconNight());

        /** @var Entity\Coordinate $morningSymbolSky16Coordinate */
        $morningSymbolSky16Coordinate = $morningSymbolSky16->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $morningSymbolSky16Coordinate);
        $this->assertEquals(41.60182995641954, $morningSymbolSky16Coordinate->getLatitude());
        $this->assertEquals(2.5272895275390606, $morningSymbolSky16Coordinate->getLongitude());

        /** @var array $morningSymbolsSea */
        $morningSymbolsSea = $morningSymbols->getSea();
        $this->assertIsArray($morningSymbolsSea);
        $this->assertCount(4, $morningSymbolsSea);

        /** @var Entity\ForecastSymbolCommon $morningSymbolsSea3 */
        $morningSymbolsSea3 = $morningSymbolsSea[3];
        $this->assertInstanceOf(Entity\ForecastSymbolCommon::class, $morningSymbolsSea3);

        /** @var Entity\SymbolValue $morningSymbolsSea3Symbol */
        $morningSymbolsSea3Symbol = $morningSymbolsSea3->getSymbol();
        $this->assertInstanceOf(Entity\SymbolValue::class, $morningSymbolsSea3Symbol);
        $this->assertEquals('52', $morningSymbolsSea3Symbol->getCode());
        $this->assertEquals(null, $morningSymbolsSea3Symbol->getName());
        $this->assertEquals(null, $morningSymbolsSea3Symbol->getCategory());
        $this->assertEquals(null, $morningSymbolsSea3Symbol->getDescription());
        $this->assertEquals(null, $morningSymbolsSea3Symbol->getUrlIcon());
        $this->assertEquals(null, $morningSymbolsSea3Symbol->getUrlIconNight());

        /** @var Entity\Coordinate $morningSymbolsSea3Coordinate */
        $morningSymbolsSea3Coordinate = $morningSymbolsSea3->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $morningSymbolsSea3Coordinate);
        $this->assertEquals(42.41089872784786, $morningSymbolsSea3Coordinate->getLatitude());
        $this->assertEquals(3.383304094641173, $morningSymbolsSea3Coordinate->getLongitude());

        /** @var array $morningSymbolsWind */
        $morningSymbolsWind = $morningSymbols->getWind();
        $this->assertIsArray($morningSymbolsWind);
        $this->assertCount(3, $morningSymbolsWind);

        /** @var Entity\ForecastSymbolWind $morningSymbolsWind2 */
        $morningSymbolsWind2 = $morningSymbolsWind[2];
        $this->assertInstanceOf(Entity\ForecastSymbolWind::class, $morningSymbolsWind2);
        $this->assertEquals(0, $morningSymbolsWind2->getDirection());
        $this->assertEquals('var', $morningSymbolsWind2->getVelocity());
        $this->assertEquals('1/3', $morningSymbolsWind2->getBeaufort());

        /** @var Entity\Coordinate $morningSymbolsWind3Coordinate */
        $morningSymbolsWind3Coordinate = $morningSymbolsWind2->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $morningSymbolsWind3Coordinate);
        $this->assertEquals(40.94016380435247, $morningSymbolsWind3Coordinate->getLatitude());
        $this->assertEquals(1.1882184978563157, $morningSymbolsWind3Coordinate->getLongitude());

        /** @var Entity\ForecastPart $afternoon */
        $afternoon = $entityResponse->getAfternoon();
        $this->assertInstanceOf(Entity\ForecastPart::class, $afternoon);

        /** @var array $afternoonTendencies */
        $afternoonTendencies = $afternoon->getTendency();
        $this->assertIsArray($afternoonTendencies);
        $this->assertCount(1, $afternoonTendencies);

        /** @var Entity\ForecastTendency $afternoonTendency */
        $afternoonTendency = current($afternoonTendencies);
        $this->assertInstanceOf(Entity\ForecastTendency::class, $afternoonTendency);
        $this->assertEquals('tx', $afternoonTendency->getType());
        $this->assertEquals(0, $afternoonTendency->getValue());

        /** @var Entity\ForecastSymbol $afternoonSymbols */
        $afternoonSymbols = $afternoon->getSymbol();
        $this->assertInstanceOf(Entity\ForecastSymbol::class, $afternoonSymbols);

        /** @var array $afternoonSymbolsSky */
        $afternoonSymbolsSky = $afternoonSymbols->getSky();
        $this->assertIsArray($afternoonSymbolsSky);
        $this->assertCount(15, $afternoonSymbolsSky);

        /** @var Entity\ForecastSymbolCommon $afternoonSymbolsSky14 */
        $afternoonSymbolsSky14 = $afternoonSymbolsSky[14];
        $this->assertInstanceOf(Entity\ForecastSymbolCommon::class, $afternoonSymbolsSky14);

        /** @var Entity\SymbolValue $afternoonSymbolsSky14Symbol */
        $afternoonSymbolsSky14Symbol = $afternoonSymbolsSky14->getSymbol();
        $this->assertInstanceOf(Entity\SymbolValue::class, $afternoonSymbolsSky14Symbol);
        $this->assertEquals('1', $afternoonSymbolsSky14Symbol->getCode());
        $this->assertEquals(null, $afternoonSymbolsSky14Symbol->getName());
        $this->assertEquals(null, $afternoonSymbolsSky14Symbol->getCategory());
        $this->assertEquals(null, $afternoonSymbolsSky14Symbol->getDescription());
        $this->assertEquals(null, $afternoonSymbolsSky14Symbol->getUrlIcon());
        $this->assertEquals(null, $afternoonSymbolsSky14Symbol->getUrlIconNight());

        /** @var Entity\Coordinate $afternoonSymbolsSky14Coordinate */
        $afternoonSymbolsSky14Coordinate = $afternoonSymbolsSky14->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $afternoonSymbolsSky14Coordinate);
        $this->assertEquals(41.84787037390455, $afternoonSymbolsSky14Coordinate->getLatitude());
        $this->assertEquals(2.333970608514915, $afternoonSymbolsSky14Coordinate->getLongitude());

        /** @var array $afternoonSymbolsSea */
        $afternoonSymbolsSea = $afternoonSymbols->getSea();
        $this->assertIsArray($afternoonSymbolsSea);

        /** @var Entity\ForecastSymbolCommon $afternoonSymbolsSea4 */
        $afternoonSymbolsSea4 = $afternoonSymbolsSea[4];
        $this->assertInstanceOf(Entity\ForecastSymbolCommon::class, $afternoonSymbolsSea4);

        /** @var Entity\SymbolValue $afternoonSymbolsSea4Symbol */
        $afternoonSymbolsSea4Symbol = $afternoonSymbolsSea4->getSymbol();
        $this->assertInstanceOf(Entity\SymbolValue::class, $afternoonSymbolsSea4Symbol);
        $this->assertEquals('53', $afternoonSymbolsSea4Symbol->getCode());
        $this->assertEquals(null, $afternoonSymbolsSea4Symbol->getName());
        $this->assertEquals(null, $afternoonSymbolsSea4Symbol->getCategory());
        $this->assertEquals(null, $afternoonSymbolsSea4Symbol->getDescription());
        $this->assertEquals(null, $afternoonSymbolsSea4Symbol->getUrlIcon());
        $this->assertEquals(null, $afternoonSymbolsSea4Symbol->getUrlIconNight());

        /** @var Entity\Coordinate $afternoonSymbolsSea4Coordinate */
        $afternoonSymbolsSea4Coordinate = $afternoonSymbolsSea4->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $afternoonSymbolsSea4Coordinate);
        $this->assertEquals(42.410795484380266, $afternoonSymbolsSea4Coordinate->getLatitude());
        $this->assertEquals(3.413028979123877, $afternoonSymbolsSea4Coordinate->getLongitude());

        /** @var array $afternoonSymbolsWind */
        $afternoonSymbolsWind = $afternoonSymbols->getWind();
        $this->assertIsArray($afternoonSymbolsWind);
        $this->assertCount(4, $afternoonSymbolsWind);

        /** @var Entity\ForecastSymbolWind $afternoonSymbolsWind3 */
        $afternoonSymbolsWind3 = $afternoonSymbolsWind[3];
        $this->assertInstanceOf(Entity\ForecastSymbolWind::class, $afternoonSymbolsWind3);
        $this->assertEquals(135, $afternoonSymbolsWind3->getDirection());
        $this->assertEquals('15', $afternoonSymbolsWind3->getVelocity());
        $this->assertEquals('3/4', $afternoonSymbolsWind3->getBeaufort());

        /** @var Entity\Coordinate $afternoonSymbolsWind3Coordinate */
        $afternoonSymbolsWind3Coordinate = $afternoonSymbolsWind3->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $afternoonSymbolsWind3Coordinate);
        $this->assertEquals(42.11352146599646, $afternoonSymbolsWind3Coordinate->getLatitude());
        $this->assertEquals(3.3815070616406535, $afternoonSymbolsWind3Coordinate->getLongitude());

        /** @var Entity\ForecastVariable $variables */
        $variables = $entityResponse->getVariable();
        $this->assertInstanceOf(Entity\ForecastVariable::class, $variables);
        $this->assertEquals('Cel serè o poc ennuvolat fins a migdia. A partir de llavors arribaran bandes de núvols alts per l\'oest del territori que al final del dia s\'estendran a tot el territori; a més, també creixeran algunes nuvolades a zones de muntanya. Independentment, a la meitat sud del litoral i prelitoral i al litoral nord hi haurà intervals de núvols baixos, més trencats durant les hores centrals de la jornada, que localment deixaran el cel entre mig i molt ennuvolat; de forma puntual, sobretot fins a primera hora del matí i també a partir del vespre aquests intervals de núvols baixos també podran estendre\'s a altres punts del litoral.', $variables->getSky());
        $this->assertEquals('Al Pirineu no es descarta algun ruixat aïllat durant la tarda, i és possible a partir del vespre.', $variables->getRain());
        $this->assertEquals('La temperatura mínima serà similar o lleugerament més alta; al Pirineu oscil·larà entre 11 i 16 ºC, al Prepirineu, depressió Central i prelitoral entre 16 i 21 ºC i al litoral entre 20 i 25 ºC. Per la seva banda la temperatura màxima també serà similar o lleugerament més alta i es mourà entre 29 i 34 ºC al Pirineu i al litoral, entre 34 i 39 ºC a Ponent i entre 32 i 37 ºC a la resta.', $variables->getTemperature());
        $this->assertEquals('La visibilitat serà excel·lent arreu, si bé serà bona o regular fins a mig matí i de nou a partir del vespre a punts del litoral i del prelitoral, sobretot a la meitat sud del sector.', $variables->getVisibility());
        $this->assertEquals('El vent serà fluix i de direcció variable a l\'inici i al final de la jornada. Durant les hores centrals del dia s\'imposarà el component sud entre fluix i moderat, amb cops forts a la tarda a l\'extrem nord del litoral i al sud de Ponent.', $variables->getWind());
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
