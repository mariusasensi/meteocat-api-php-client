<?php

declare(strict_types=1);

use Meteocat\Model\Exception\EntityNotFound;
use Meteocat\Model\Exception\NoDataAvailable;
use Meteocat\Model\Exception\StoreResponseAlreadyExist;
use Meteocat\Model\Exception\StoreResponseDirectoryNotFound;
use Meteocat\Model\Exception\StoreResponseInvalidFileName;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\Quota\Information\GetCurrentUsage;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testNoDataAvailable1()
    {
        $this->expectException(NoDataAvailable::class);
        $query = new GetCurrentUsage();

        Builder::create($query->getResponseClass(), '{}'); // Bum!
    }

    public function testNoDataAvailable2()
    {
        $this->expectException(NoDataAvailable::class);
        $query = new GetCurrentUsage();

        Builder::create($query->getResponseClass(), '[]'); // Bum!
    }

    public function testEntityNotFound()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.quotes.v1.consum-actual.json');

        $this->expectException(EntityNotFound::class);

        Builder::create('ClassNotExist', $mockResponse); // Bum!
    }

    public function testSaveDirectory()
    {
        $cant = Builder::canUsePathToSave('ThisDirNotExist');
        $this->assertFalse($cant);

        $can = Builder::canUsePathToSave('src');
        $this->assertTrue($can);
    }
    
    public function testInvalidFileName()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.quotes.v1.consum-actual.json');

        $this->expectException(StoreResponseInvalidFileName::class);

        Builder::save('tests', '', $mockResponse);
    }

    public function testInvalidDirectoy()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.quotes.v1.consum-actual.json');

        $this->expectException(StoreResponseDirectoryNotFound::class);

        Builder::save('', 'test', $mockResponse);
    }

    public function testNoDataToSave()
    {
        $this->expectException(StoreResponseDirectoryNotFound::class);

        Builder::save('ThisDirNotExist', 'test', '');
    }

    public function testAlreadyExist()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.quotes.v1.consum-actual.json');

        $this->expectException(StoreResponseAlreadyExist::class);
        $query = new GetCurrentUsage();

        Builder::save('tests/.cached_responses', $query->getName(), $mockResponse);
    }
}
