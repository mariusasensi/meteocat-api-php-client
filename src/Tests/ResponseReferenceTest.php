<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\Reference\Data;
use PHPUnit\Framework\TestCase;

class ResponseReferenceTest extends TestCase
{
    public function testGetAllCounties()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.referencia.v1.comarques.json');

        /** @var Data\GetAllCounties $query */
        $query = new Data\GetAllCounties();

        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);

        /** @var Entity\County $county1 */
        $county1 = current($entityResponse);
        $this->assertInstanceOf(Entity\County::class, $county1);
        $this->assertEquals(5, $county1->getCode());
        $this->assertEquals('Alta Ribagorça', $county1->getName());

        /** @var Entity\County $county2 */
        $county2 = next($entityResponse);
        $this->assertInstanceOf(Entity\County::class, $county2);
        $this->assertEquals(1, $county2->getCode());
        $this->assertEquals('Alt Camp', $county2->getName());

        /** @var Entity\County $county25 */
        $county25 = $entityResponse[25];
        $this->assertInstanceOf(Entity\County::class, $county25);
        $this->assertEquals(25, $county25->getCode());
        $this->assertEquals('Pallars Jussà', $county25->getName());

        /** @var Entity\County $countyLast */
        $countyLast = end($entityResponse);
        $this->assertInstanceOf(Entity\County::class, $countyLast);
        $this->assertEquals(41, $countyLast->getCode());
        $this->assertEquals('Vallès Oriental', $countyLast->getName());
    }

    public function testGetAllCities()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.referencia.v1.municipis.json');

        /** @var Data\GetAllCities $query */
        $query = new Data\GetAllCities();

        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);

        /** @var Entity\City $city1 */
        $city1 = current($entityResponse);
        $this->assertInstanceOf(Entity\City::class, $city1);
        $this->assertEquals('250019', $city1->getCode());
        $this->assertEquals('Abella de la Conca', $city1->getName());
        $this->assertEquals([], $city1->getLightningDischarges());

        /** @var Entity\Coordinate $city1Cood */
        $city1Cood = $city1->getCoordinate();
        $this->assertInstanceOf(Entity\Coordinate::class, $city1Cood);
        $this->assertEquals(42.16130365400063, $city1Cood->getLatitude());
        $this->assertEquals(1.0917273756684127, $city1Cood->getLongitude());

        /** @var Entity\County $city1County */
        $city1County = $city1->getCounty();
        $this->assertInstanceOf(Entity\County::class, $city1County);
        $this->assertEquals(25, $city1County->getCode());
        $this->assertEquals('Pallars Jussà', $city1County->getName());
    }

    public function testGetAllSymbols()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.referencia.v1.simbols.json');

        /** @var Data\GetAllSymbols $query */
        $query = new Data\GetAllSymbols();

        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertIsArray($entityResponse);

        /** @var Entity\Symbol $symbol1 */
        $symbol1 = current($entityResponse);
        $this->assertInstanceOf(Entity\Symbol::class, $symbol1);
        $this->assertEquals('cel', $symbol1->getName());
        $this->assertEquals('estat del cel', $symbol1->getDescription());

        $symbol1Values = $symbol1->getValues();
        $this->assertIsArray($symbol1Values);

        /** @var Entity\SymbolValue $symbol1Values1 */
        $symbol1Values1 = current($symbol1Values);
        $this->assertInstanceOf(Entity\SymbolValue::class, $symbol1Values1);
        $this->assertEquals('1', $symbol1Values1->getCode());
        $this->assertEquals('Cel serè', $symbol1Values1->getName());
        $this->assertEquals('', $symbol1Values1->getDescription());
        $this->assertEquals('nuvolositat', $symbol1Values1->getCategory());
        $this->assertEquals('http://static-m.meteo.cat/assets-w3/images/meteors/estatcel/1.svg', $symbol1Values1->getUrlIcon());
        $this->assertEquals('http://static-m.meteo.cat/assets-w3/images/meteors/estatcel/1n.svg', $symbol1Values1->getUrlIconNight());
    }
}
