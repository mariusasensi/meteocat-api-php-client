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
        $this->assertEquals('Cel serè o poc ennuvolat fins a migdia. A partir de llavors arribaran bandes de núvols alts per l\'oest del territori que al final del dia s\'estendran a tot el territori; a més, també creixeran algunes nuvolades a zones de muntanya. Independentment, a la meitat sud del litoral i prelitoral i al litoral nord hi haurà intervals de núvols baixos, més trencats durant les hores centrals de la jornada, que localment deixaran el cel entre mig i molt ennuvolat; de forma puntual, sobretot fins a primera hora del matí i també a partir del vespre aquests intervals de núvols baixos també podran estendre\'s a altres punts del litoral.',
            $variables->getSky());
        $this->assertEquals('Al Pirineu no es descarta algun ruixat aïllat durant la tarda, i és possible a partir del vespre.',
            $variables->getRain());
        $this->assertEquals('La temperatura mínima serà similar o lleugerament més alta; al Pirineu oscil·larà entre 11 i 16 ºC, al Prepirineu, depressió Central i prelitoral entre 16 i 21 ºC i al litoral entre 20 i 25 ºC. Per la seva banda la temperatura màxima també serà similar o lleugerament més alta i es mourà entre 29 i 34 ºC al Pirineu i al litoral, entre 34 i 39 ºC a Ponent i entre 32 i 37 ºC a la resta.',
            $variables->getTemperature());
        $this->assertEquals('La visibilitat serà excel·lent arreu, si bé serà bona o regular fins a mig matí i de nou a partir del vespre a punts del litoral i del prelitoral, sobretot a la meitat sud del sector.',
            $variables->getVisibility());
        $this->assertEquals('El vent serà fluix i de direcció variable a l\'inici i al final de la jornada. Durant les hores centrals del dia s\'imposarà el component sud entre fluix i moderat, amb cops forts a la tarda a l\'extrem nord del litoral i al sud de Ponent.',
            $variables->getWind());
    }

    public function testGetCountyByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.comarcal.2019.08.06.json');

        /** @var Forecast\GetCountyByDate $query */
        $query = new Forecast\GetCountyByDate(DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var Entity\ForecastCounty $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\ForecastCounty::class, $entityResponse);

        /** @var Entity\ForecastCountyPart $morning */
        $morning = $entityResponse->getMorning();
        $this->assertInstanceOf(Entity\ForecastCountyPart::class, $morning);
        $this->assertEquals('morning', $morning->getDayPart());

        /** @var array $morningSkies */
        $morningSkies = $morning->getSky();
        $this->assertIsArray($morningSkies);
        $this->assertCount(42, $morningSkies);

        /** @var Entity\ForecastCountySky $morningSkies1 */
        $morningSkies1 = current($morningSkies);
        $this->assertInstanceOf(Entity\ForecastCountySky::class, $morningSkies1);
        $this->assertInstanceOf(Entity\SymbolValue::class, $morningSkies1->getSymbol());
        $this->assertEquals('3', $morningSkies1->getSymbol()->getCode());
        $this->assertEquals(null, $morningSkies1->getSymbol()->getName());
        $this->assertEquals(null, $morningSkies1->getSymbol()->getDescription());
        $this->assertEquals(null, $morningSkies1->getSymbol()->getCategory());
        $this->assertEquals(null, $morningSkies1->getSymbol()->getUrlIcon());
        $this->assertEquals(null, $morningSkies1->getSymbol()->getUrlIconNight());
        $this->assertInstanceOf(Entity\County::class, $morningSkies1->getCounty());
        $this->assertEquals(1, $morningSkies1->getCounty()->getCode());
        $this->assertEquals(null, $morningSkies1->getCounty()->getName());

        /** @var array $morningHails */
        $morningHails = $morning->getHail();
        $this->assertIsArray($morningHails);
        $this->assertCount(42, $morningHails);

        /** @var Entity\ForecastCountyHail $morningHails1 */
        $morningHails1 = current($morningHails);
        $this->assertInstanceOf(Entity\ForecastCountyHail::class, $morningHails1);
        $this->assertInstanceOf(Entity\County::class, $morningHails1->getCounty());
        $this->assertEquals(1, $morningHails1->getCounty()->getCode());
        $this->assertEquals(null, $morningHails1->getCounty()->getName());
        $this->assertEquals(1, $morningHails1->getLevel());

        /** @var array $morningRains */
        $morningRains = $morning->getRain();
        $this->assertIsArray($morningRains);
        $this->assertCount(42, $morningRains);

        /** @var Entity\ForecastCountyRain $morningRains1 */
        $morningRains1 = current($morningRains);
        $this->assertInstanceOf(Entity\ForecastCountyRain::class, $morningRains1);
        $this->assertInstanceOf(Entity\County::class, $morningRains1->getCounty());
        $this->assertEquals(23, $morningRains1->getCounty()->getCode());
        $this->assertEquals(null, $morningRains1->getCounty()->getName());
        $this->assertEquals(1, $morningRains1->getChance());
        $this->assertEquals(0, $morningRains1->getIntensity());
        $this->assertEquals(0, $morningRains1->getAccumulation());

        /** @var Entity\ForecastCountyPart $afternoon */
        $afternoon = $entityResponse->getAfternoon();
        $this->assertInstanceOf(Entity\ForecastCountyPart::class, $afternoon);
        $this->assertEquals('afternoon', $afternoon->getDayPart());

        /** @var array $afternoonSkies */
        $afternoonSkies = $afternoon->getSky();
        $this->assertIsArray($afternoonSkies);
        $this->assertCount(42, $afternoonSkies);

        /** @var Entity\ForecastCountySky $afternoonSkies1 */
        $afternoonSkies1 = current($afternoonSkies);
        $this->assertInstanceOf(Entity\ForecastCountySky::class, $afternoonSkies1);
        $this->assertInstanceOf(Entity\SymbolValue::class, $afternoonSkies1->getSymbol());
        $this->assertEquals('3', $afternoonSkies1->getSymbol()->getCode());
        $this->assertEquals(null, $afternoonSkies1->getSymbol()->getName());
        $this->assertEquals(null, $afternoonSkies1->getSymbol()->getDescription());
        $this->assertEquals(null, $afternoonSkies1->getSymbol()->getCategory());
        $this->assertEquals(null, $afternoonSkies1->getSymbol()->getUrlIcon());
        $this->assertEquals(null, $afternoonSkies1->getSymbol()->getUrlIconNight());
        $this->assertInstanceOf(Entity\County::class, $afternoonSkies1->getCounty());
        $this->assertEquals('1', $afternoonSkies1->getCounty()->getCode());
        $this->assertEquals(null, $afternoonSkies1->getCounty()->getName());

        /** @var array $afternoonHails */
        $afternoonHails = $afternoon->getHail();
        $this->assertIsArray($afternoonHails);
        $this->assertCount(42, $afternoonHails);

        /** @var Entity\ForecastCountyHail $afternoonHails1 */
        $afternoonHails1 = current($afternoonHails);
        $this->assertInstanceOf(Entity\ForecastCountyHail::class, $afternoonHails1);
        $this->assertInstanceOf(Entity\County::class, $afternoonHails1->getCounty());
        $this->assertEquals(1, $afternoonHails1->getCounty()->getCode());
        $this->assertEquals(null, $afternoonHails1->getCounty()->getName());
        $this->assertEquals(1, $afternoonHails1->getLevel());

        /** @var array $afternoonRains */
        $afternoonRains = $afternoon->getRain();
        $this->assertIsArray($afternoonRains);
        $this->assertCount(42, $afternoonRains);

        /** @var Entity\ForecastCountyRain $afternoonRains1 */
        $afternoonRains1 = current($afternoonRains);
        $this->assertInstanceOf(Entity\ForecastCountyRain::class, $afternoonRains1);
        $this->assertInstanceOf(Entity\County::class, $afternoonRains1->getCounty());
        $this->assertEquals(19, $afternoonRains1->getCounty()->getCode());
        $this->assertEquals(null, $afternoonRains1->getCounty()->getName());
        $this->assertEquals(1, $afternoonRains1->getChance());
        $this->assertEquals(0, $afternoonRains1->getIntensity());
        $this->assertEquals(0, $afternoonRains1->getAccumulation());

        /** @var array $maximums */
        $maximums = $entityResponse->getMaximum();
        $this->assertIsArray($maximums);
        $this->assertCount(42, $maximums);

        /** @var Entity\ForecastCountyTemperature $maximums20 */
        $maximums20 = $maximums[19];
        $this->assertEquals(34, $maximums20->getTemperature());
        $this->assertInstanceOf(Entity\County::class, $maximums20->getCounty());
        $this->assertEquals(20, $maximums20->getCounty()->getCode());
        $this->assertEquals(null, $maximums20->getCounty()->getName());

        /** @var array $minimums */
        $minimums = $entityResponse->getMinimum();
        $this->assertIsArray($minimums);
        $this->assertCount(42, $minimums);

        /** @var Entity\ForecastCountyTemperature $minimums10 */
        $minimums10 = $minimums[9];
        $this->assertEquals(19, $minimums10->getTemperature());
        $this->assertInstanceOf(Entity\County::class, $minimums10->getCounty());
        $this->assertEquals(10, $minimums10->getCounty()->getCode());
        $this->assertEquals(null, $minimums10->getCounty()->getName());

    }

    public function testGetByCity()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.municipal.082444.json');

        /** @var Forecast\GetByCity $query */
        $query = new Forecast\GetByCity('082444');

        /** @var Entity\ForecastCity $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\ForecastCity::class, $entityResponse);

        /** @var Entity\City $city */
        $city = $entityResponse->getCity();
        $this->assertInstanceOf(Entity\City::class, $city);
        $this->assertEquals('082444', $city->getCode());
        $this->assertEquals(null, $city->getName());
        $this->assertEquals(null, $city->getCounty());
        $this->assertEquals(null, $city->getCoordinate());
        $this->assertEquals([], $city->getLightningDischarges());

        /** @var array $days */
        $days = $entityResponse->getDays();
        $this->assertIsArray($days);
        $this->assertCount(8, $days);

        /** @var Entity\ForecastCityDay $day1 */
        $day1 = current($days);
        $this->assertInstanceOf(Entity\ForecastCityDay::class, $day1);
        $this->assertInstanceOf(DateTime::class, $day1->getDate());
        $this->assertEquals('2019-08-05', $day1->getDate()->format('Y-m-d'));
        $this->assertInstanceOf(Entity\ForecastCityVariable::class, $day1->getTemperatureMaximum());
        $this->assertEquals('Maximum Temperature', $day1->getTemperatureMaximum()->getName());
        $this->assertEquals('°C', $day1->getTemperatureMaximum()->getUnit());
        $this->assertEquals(30.917, $day1->getTemperatureMaximum()->getValue());
        $this->assertInstanceOf(Entity\ForecastCityVariable::class, $day1->getTemperatureMinimum());
        $this->assertEquals('Minimum Temperature', $day1->getTemperatureMinimum()->getName());
        $this->assertEquals('°C', $day1->getTemperatureMinimum()->getUnit());
        $this->assertEquals(20.42, $day1->getTemperatureMinimum()->getValue());
        $this->assertInstanceOf(Entity\ForecastCityVariable::class, $day1->getRain());
        $this->assertEquals('Rain', $day1->getRain()->getName());
        $this->assertEquals('%', $day1->getRain()->getUnit());
        $this->assertEquals(3.72, $day1->getRain()->getValue());
        $this->assertInstanceOf(Entity\ForecastCityVariable::class, $day1->getSky());
        $this->assertEquals('Sky', $day1->getSky()->getName());
        $this->assertEquals(null, $day1->getSky()->getUnit());
        $this->assertEquals(1, $day1->getSky()->getValue());
    }

    public function testGetCurrentWarnings()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.smp.episodis-oberts.json');

        /** @var Forecast\GetCurrentWarnings $query */
        $query = new Forecast\GetCurrentWarnings();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(1, $entityResponse);

        /** @var Entity\Alert $alert1 */
        $alert1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Alert::class, $alert1);

        /** @var Entity\Status $alert1Status */
        $alert1Status = $alert1->getStatus();
        $this->assertInstanceOf(Entity\Status::class, $alert1Status);
        $this->assertEquals('Obert', $alert1Status->getName());
        $this->assertEquals(null, $alert1Status->getDate());

        /** @var Entity\Meteor $alert1Meteor */
        $alert1Meteor = $alert1->getMeteor();
        $this->assertInstanceOf(Entity\Meteor::class, $alert1Meteor);
        $this->assertEquals('Calor', $alert1Meteor->getName());

        /** @var array $alert1Notices */
        $alert1Notices = $alert1->getNotices();
        $this->assertIsArray($alert1Notices);
        $this->assertCount(3, $alert1Notices);

        /** @var Entity\Notice $alert1Notices1 */
        $alert1Notices1 = current($alert1Notices);
        $this->assertInstanceOf(Entity\Notice::class, $alert1Notices1);
        $this->assertEquals(null, $alert1Notices1->getLevel());
        $this->assertEquals('Avís', $alert1Notices1->getType());
        $this->assertEquals('Ampliat', $alert1Notices1->getStatus());
        $this->assertEquals(null, $alert1Notices1->getThreshold());
        $this->assertEquals(null, $alert1Notices1->getWarning());
        $this->assertEquals(null, $alert1Notices1->getComment());
        $this->assertInstanceOf(DateTime::class, $alert1Notices1->getDateStart());
        $this->assertEquals('2019-08-05 12:00:00', $alert1Notices1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertInstanceOf(DateTime::class, $alert1Notices1->getDateEnd());
        $this->assertEquals('2019-08-05 17:59:00', $alert1Notices1->getDateEnd()->format('Y-m-d H:i:s'));
        $this->assertInstanceOf(DateTime::class, $alert1Notices1->getDateEmission());
        $this->assertEquals('2019-08-04 17:20:00', $alert1Notices1->getDateEmission()->format('Y-m-d H:i:s'));

        /** @var array $alert1Evolutions */
        $alert1Evolutions = $alert1Notices1->getEvolutions();
        $this->assertIsArray($alert1Evolutions);
        $this->assertCount(1, $alert1Evolutions);

        /** @var Entity\Evolution $alert1Evolutions1 */
        $alert1Evolutions1 = current($alert1Evolutions);
        $this->assertInstanceOf(Entity\Evolution::class, $alert1Evolutions1);
        $this->assertInstanceOf(DateTime::class, $alert1Evolutions1->getDay());
        $this->assertEquals('2019-08-05 00:00:00', $alert1Evolutions1->getDay()->format('Y-m-d H:i:s'));
        $this->assertEquals('', $alert1Evolutions1->getComment());
        $this->assertEquals(1, $alert1Evolutions1->getRepresentative());
        $this->assertEquals('Temperatura màxima extrema', $alert1Evolutions1->getThreshold1());
        $this->assertEquals(null, $alert1Evolutions1->getThreshold2());
        $this->assertEquals('LOCAL', $alert1Evolutions1->getGeographicalDistribution());
        $this->assertEquals('', $alert1Evolutions1->getMaximumValue());

        /** @var array $alert1Evolutions1Periods */
        $alert1Evolutions1Periods = $alert1Evolutions1->getPeriods();
        $this->assertIsArray($alert1Evolutions1Periods);
        $this->assertCount(4, $alert1Evolutions1Periods);

        /** @var Entity\Period $alert1Evolutions1Periods1 */
        $alert1Evolutions1Periods1 = current($alert1Evolutions1Periods);
        $this->assertInstanceOf(Entity\Period::class, $alert1Evolutions1Periods1);
        $this->assertEquals('00-06', $alert1Evolutions1Periods1->getName());
        $this->assertEquals([], $alert1Evolutions1Periods1->getAffectations());

        /** @var Entity\Period $alert1Evolutions1Periods2 */
        $alert1Evolutions1Periods2 = next($alert1Evolutions1Periods);
        $this->assertInstanceOf(Entity\Period::class, $alert1Evolutions1Periods2);
        $this->assertEquals('06-12', $alert1Evolutions1Periods2->getName());
        $this->assertEquals([], $alert1Evolutions1Periods2->getAffectations());

        /** @var Entity\Period $alert1Evolutions1Periods3 */
        $alert1Evolutions1Periods3 = next($alert1Evolutions1Periods);
        $this->assertInstanceOf(Entity\Period::class, $alert1Evolutions1Periods3);
        $this->assertEquals('12-18', $alert1Evolutions1Periods3->getName());

        /** @var array $alert1Evolutions1Periods3Affectations */
        $alert1Evolutions1Periods3Affectations = $alert1Evolutions1Periods3->getAffectations();
        $this->assertIsArray($alert1Evolutions1Periods3Affectations);
        $this->assertCount(3, $alert1Evolutions1Periods3Affectations);

        /** @var Entity\Affectation $alert1Evolutions1Periods3Affectations1 */
        $alert1Evolutions1Periods3Affectations1 = current($alert1Evolutions1Periods3Affectations);
        $this->assertInstanceOf(Entity\Affectation::class, $alert1Evolutions1Periods3Affectations1);
        $this->assertEquals('Temperatura màxima extrema', $alert1Evolutions1Periods3Affectations1->getThreshold());
        $this->assertEquals(false, $alert1Evolutions1Periods3Affectations1->isAuxiliary());
        $this->assertEquals(1, $alert1Evolutions1Periods3Affectations1->getWarning());
        $this->assertEquals(1, $alert1Evolutions1Periods3Affectations1->getLevel());
        $this->assertInstanceOf(DateTime::class, $alert1Evolutions1Periods3Affectations1->getDay());
        $this->assertEquals('2019-08-05 00:00:00', $alert1Evolutions1Periods3Affectations1->getDay()->format('Y-m-d H:i:s'));

        /** @var Entity\County $alert1Evolutions1Periods3Affectations1County */
        $alert1Evolutions1Periods3Affectations1County = $alert1Evolutions1Periods3Affectations1->getCounty();
        $this->assertInstanceOf(Entity\County::class, $alert1Evolutions1Periods3Affectations1County);
        $this->assertEquals(23, $alert1Evolutions1Periods3Affectations1County->getCode());
        $this->assertEquals(null, $alert1Evolutions1Periods3Affectations1County->getName());
    }

    public function testGetCurrentAlerts()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.smp.episodis-oberts.preavisos.json');

        /** @var Forecast\GetCurrentAlerts $query */
        $query = new Forecast\GetCurrentAlerts();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(2, $entityResponse);

        /** @var Entity\Alert $alert1 */
        $alert1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Alert::class, $alert1);

        /** @var Entity\Status $alert1Status */
        $alert1Status = $alert1->getStatus();
        $this->assertInstanceOf(Entity\Status::class, $alert1Status);
        $this->assertEquals('Obert', $alert1Status->getName());
        $this->assertEquals(null, $alert1Status->getDate());

        /** @var Entity\Meteor $alert1Meteor */
        $alert1Meteor = $alert1->getMeteor();
        $this->assertInstanceOf(Entity\Meteor::class, $alert1Meteor);
        $this->assertEquals('Calor', $alert1Meteor->getName());

        /** @var array $alert1Notices */
        $alert1Notices = $alert1->getNotices();
        $this->assertIsArray($alert1Notices);
        $this->assertCount(1, $alert1Notices);

        /** @var Entity\Notice $alert1Notices1 */
        $alert1Notices1 = current($alert1Notices);
        $this->assertInstanceOf(Entity\Notice::class, $alert1Notices1);
        $this->assertEquals(1, $alert1Notices1->getLevel());
        $this->assertEquals('Preavís', $alert1Notices1->getType());
        $this->assertEquals('Vigent', $alert1Notices1->getStatus());
        $this->assertEquals('Temperatura màxima extrema', $alert1Notices1->getThreshold());
        $this->assertEquals(2, $alert1Notices1->getWarning());
        $this->assertEquals('', $alert1Notices1->getComment());
        $this->assertEquals([], $alert1Notices1->getEvolutions());
        $this->assertInstanceOf(DateTime::class, $alert1Notices1->getDateStart());
        $this->assertEquals('2017-03-06 00:00:00', $alert1Notices1->getDateStart()->format('Y-m-d H:i:s'));
        $this->assertInstanceOf(DateTime::class, $alert1Notices1->getDateEnd());
        $this->assertEquals('2017-03-08 23:59:00', $alert1Notices1->getDateEnd()->format('Y-m-d H:i:s'));
        $this->assertInstanceOf(DateTime::class, $alert1Notices1->getDateEmission());
        $this->assertEquals('2017-03-06 12:07:00', $alert1Notices1->getDateEmission()->format('Y-m-d H:i:s'));
    }

    public function testGetPyreneesMountainPeakMetadata()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.pics.metadades.json');

        /** @var Forecast\GetPyreneesMountainPeakMetadata $query */
        $query = new Forecast\GetPyreneesMountainPeakMetadata();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(49, $entityResponse);

        /** @var Entity\MountainPeak $peak1 */
        $peak1 = current($entityResponse);
        $this->assertInstanceOf(Entity\MountainPeak::class, $peak1);
        $this->assertEquals('5a69e26b', $peak1->getCode());
        $this->assertEquals('Pic de Montlude', $peak1->getName());
        $this->assertEquals('pic-de-montlude', $peak1->getSlug());
        $this->assertEquals('Pics', $peak1->getType());

        /** @var Entity\Coordinate $peak1Coordinate */
        $peak1Coordinate = $peak1->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $peak1Coordinate);
        $this->assertEquals(42.78524000000477, $peak1Coordinate->getLatitude());
        $this->assertEquals(0.7587399999917329, $peak1Coordinate->getLongitude());
    }

    public function testGetPyreneesMountainHuntMetadata()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.refugis.metadades.json');

        /** @var Forecast\GetPyreneesMountainHuntMetadata $query */
        $query = new Forecast\GetPyreneesMountainHuntMetadata();

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(41, $entityResponse);

        /** @var Entity\MountainHunt $hunt1 */
        $hunt1 = current($entityResponse);
        $this->assertInstanceOf(Entity\MountainHunt::class, $hunt1);
        $this->assertEquals('9cc1a507', $hunt1->getCode());
        $this->assertEquals('Refugi Colomina', $hunt1->getName());
        $this->assertEquals('refugi-colomina', $hunt1->getSlug());
        $this->assertEquals('Refugis', $hunt1->getType());

        /** @var Entity\Coordinate $hunt1Coordinate */
        $hunt1Coordinate = $hunt1->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $hunt1Coordinate);
        $this->assertEquals(42.5194300000046, $hunt1Coordinate->getLatitude());
        $this->assertEquals(1.0012399999953603, $hunt1Coordinate->getLongitude());
    }

    public function testGetPyreneesMountainPeakByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.pics.costabona.2019.08.06.json');

        /** @var Forecast\GetPyreneesMountainPeakByDate $query */
        $query = new Forecast\GetPyreneesMountainPeakByDate('costabona',
            DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(8, $entityResponse);

        /** @var Entity\ForecastMountainPeak $mountain1 */
        $mountain1 = current($entityResponse);
        $this->assertInstanceOf(Entity\ForecastMountainPeak::class, $mountain1);
        $this->assertInstanceOf(DateTime::class, $mountain1->getDate());
        $this->assertEquals('2019-08-06 00:00', $mountain1->getDate()->format('Y-m-d H:i'));

        /** @var array $mountain1Altitude */
        $mountain1Altitude = $mountain1->getAltitude();
        $this->assertIsArray($mountain1Altitude);
        $this->assertCount(5, $mountain1Altitude);

        /** @var Entity\ForecastMountainAltitude $mountain1Altitude1 */
        $mountain1Altitude1 = current($mountain1Altitude);
        $this->assertInstanceOf(Entity\ForecastMountainAltitude::class, $mountain1Altitude1);
        $this->assertEquals('totes', $mountain1Altitude1->getAltitude());

        /** @var array $mountain1Altitude1Variables */
        $mountain1Altitude1Variables = $mountain1Altitude1->getVariables();
        $this->assertIsArray($mountain1Altitude1Variables);
        $this->assertCount(2, $mountain1Altitude1Variables);

        /** @var Entity\Variable $mountain1Altitude1Variables1 */
        $mountain1Altitude1Variables1 = current($mountain1Altitude1Variables);
        $this->assertInstanceOf(Entity\Variable::class, $mountain1Altitude1Variables1);
        $this->assertEquals('isozero', $mountain1Altitude1Variables1->getName());
        $this->assertEquals(4500, $mountain1Altitude1Variables1->getValue());

        /** @var Entity\ForecastMountainAltitude $mountain1Altitude2 */
        $mountain1Altitude2 = next($mountain1Altitude);
        $this->assertInstanceOf(Entity\ForecastMountainAltitude::class, $mountain1Altitude2);
        $this->assertEquals('1500', $mountain1Altitude2->getAltitude());

        /** @var array $mountain1Altitude2Variables */
        $mountain1Altitude2Variables = $mountain1Altitude2->getVariables();
        $this->assertIsArray($mountain1Altitude2Variables);
        $this->assertCount(4, $mountain1Altitude2Variables);

        /** @var Entity\Variable $mountain1Altitude2Variables1 */
        $mountain1Altitude2Variables1 = current($mountain1Altitude2Variables);
        $this->assertInstanceOf(Entity\Variable::class, $mountain1Altitude2Variables1);
        $this->assertEquals('humitat', $mountain1Altitude2Variables1->getName());
        $this->assertEquals(67, $mountain1Altitude2Variables1->getValue());
    }

    public function testGetPyreneesMountainHuntByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.refugis.refugi-costabona.2019.08.06.json');

        /** @var Forecast\GetPyreneesMountainHuntByDate $query */
        $query = new Forecast\GetPyreneesMountainHuntByDate('refugi-costabona',
            DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var array $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);
        $this->assertCount(8, $entityResponse);

        /** @var Entity\ForecastMountainHunt $mountain1 */
        $mountain1 = current($entityResponse);
        $this->assertInstanceOf(Entity\ForecastMountainHunt::class, $mountain1);
        $this->assertInstanceOf(DateTime::class, $mountain1->getDate());
        $this->assertEquals('2019-08-06 00:00', $mountain1->getDate()->format('Y-m-d H:i'));

        /** @var array $mountain1Altitude */
        $mountain1Altitude = $mountain1->getAltitude();
        $this->assertIsArray($mountain1Altitude);
        $this->assertCount(5, $mountain1Altitude);

        /** @var Entity\ForecastMountainAltitude $mountain1Altitude1 */
        $mountain1Altitude1 = current($mountain1Altitude);
        $this->assertInstanceOf(Entity\ForecastMountainAltitude::class, $mountain1Altitude1);
        $this->assertEquals('totes', $mountain1Altitude1->getAltitude());

        /** @var array $mountain1Altitude1Variables */
        $mountain1Altitude1Variables = $mountain1Altitude1->getVariables();
        $this->assertIsArray($mountain1Altitude1Variables);
        $this->assertCount(2, $mountain1Altitude1Variables);

        /** @var Entity\Variable $mountain1Altitude1Variables1 */
        $mountain1Altitude1Variables1 = current($mountain1Altitude1Variables);
        $this->assertInstanceOf(Entity\Variable::class, $mountain1Altitude1Variables1);
        $this->assertEquals('isozero', $mountain1Altitude1Variables1->getName());
        $this->assertEquals(4500, $mountain1Altitude1Variables1->getValue());

        /** @var Entity\ForecastMountainAltitude $mountain1Altitude2 */
        $mountain1Altitude2 = next($mountain1Altitude);
        $this->assertInstanceOf(Entity\ForecastMountainAltitude::class, $mountain1Altitude2);
        $this->assertEquals('1500', $mountain1Altitude2->getAltitude());

        /** @var array $mountain1Altitude2Variables */
        $mountain1Altitude2Variables = $mountain1Altitude2->getVariables();
        $this->assertIsArray($mountain1Altitude2Variables);
        $this->assertCount(4, $mountain1Altitude2Variables);

        /** @var Entity\Variable $mountain1Altitude2Variables1 */
        $mountain1Altitude2Variables1 = current($mountain1Altitude2Variables);
        $this->assertInstanceOf(Entity\Variable::class, $mountain1Altitude2Variables1);
        $this->assertEquals('humitat', $mountain1Altitude2Variables1->getName());
        $this->assertEquals(67, $mountain1Altitude2Variables1->getValue());

    }

    public function testGetPyreneesZonesByDate()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.pronostic.v1.pirineu.2019.08.06.json');

        /** @var Forecast\GetPyreneesZonesByDate $query */
        $query = new Forecast\GetPyreneesZonesByDate(DateTime::createFromFormat('Y-m-d', '2019-08-06'));

        /** @var Entity\ForecastPyrenees $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\ForecastPyrenees::class, $entityResponse);
        $this->assertInstanceOf(DateTime::class, $entityResponse->getDate());
        $this->assertEquals('2019-08-06', $entityResponse->getDate()->format('Y-m-d'));
        $this->assertInstanceOf(DateTime::class, $entityResponse->getPublishedAt());
        $this->assertEquals('2019-08-05 08:33', $entityResponse->getPublishedAt()->format('Y-m-d H:i'));

        $forecastTimeZones = $entityResponse->getTimeZones();
        $this->assertIsArray($forecastTimeZones);
        $this->assertCount(5, $forecastTimeZones);

        /** @var Entity\ForecastPyreneesTimeZone $forecastTimeZones1 */
        $forecastTimeZones1 = current($forecastTimeZones);
        $this->assertInstanceOf(Entity\ForecastPyreneesTimeZone::class, $forecastTimeZones1);
        $this->assertEquals(4, $forecastTimeZones1->getId());
        $this->assertEquals('18:00h - 24:00h', $forecastTimeZones1->getName());

        /** @var array $forecastTimeZones1Zones */
        $forecastTimeZones1Zones = $forecastTimeZones1->getZones();
        $this->assertIsArray($forecastTimeZones1Zones);
        $this->assertCount(7, $forecastTimeZones1Zones);

        /** @var Entity\PyreneesZone $forecastTimeZones1Zones1 */
        $forecastTimeZones1Zones1 = current($forecastTimeZones1Zones);
        $this->assertInstanceOf(Entity\PyreneesZone::class, $forecastTimeZones1Zones1);
        $this->assertEquals(5, $forecastTimeZones1Zones1->getId());
        $this->assertEquals('Vessant sud Pirineu occid', $forecastTimeZones1Zones1->getName());

        /** @var array $forecastTimeZones1Zones1Variables */
        $forecastTimeZones1Zones1Variables = $forecastTimeZones1Zones1->getVariables();
        $this->assertIsArray($forecastTimeZones1Zones1Variables);
        $this->assertCount(9, $forecastTimeZones1Zones1Variables);

        /** @var Entity\ForecastPyreneesVariable $forecastTimeZones1Zones1Variables1 */
        $forecastTimeZones1Zones1Variables1 = current($forecastTimeZones1Zones1Variables);
        $this->assertInstanceOf(Entity\ForecastPyreneesVariable::class, $forecastTimeZones1Zones1Variables1);
        $this->assertEquals('probabilitat', $forecastTimeZones1Zones1Variables1->getName());
        $this->assertEquals('3', $forecastTimeZones1Zones1Variables1->getValue());
        $this->assertEquals(1, $forecastTimeZones1Zones1Variables1->getPeriod());

        /** @var Entity\ForecastPyreneesVariable $forecastTimeZones1Zones1Variables2 */
        $forecastTimeZones1Zones1Variables2 = next($forecastTimeZones1Zones1Variables);
        $this->assertInstanceOf(Entity\ForecastPyreneesVariable::class, $forecastTimeZones1Zones1Variables2);
        $this->assertEquals('cota', $forecastTimeZones1Zones1Variables2->getName());
        $this->assertEquals(null, $forecastTimeZones1Zones1Variables2->getValue());
        $this->assertEquals(1, $forecastTimeZones1Zones1Variables2->getPeriod());
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
