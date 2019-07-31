<?php

declare(strict_types=1);

use Meteocat\Model\Exception\InvalidCredentials;
use Meteocat\Model\Query\Quota\Information\GetCurrentUsage;
use Meteocat\Provider\Meteocat;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testInvalidCredentials()
    {
        $this->expectException(InvalidCredentials::class);

        $client = new Meteocat("InvalidToken!");
        $client
            ->enableDebugMode()
            ->executeQuery(new GetCurrentUsage()); // Bum!
    }

    /*
    public function testRequest()
    {
        $client = new Meteocat($_SERVER['API_KEY']);
        $client
            ->enableDebugMode()
            ->saveResponse(__DIR__ . "/.cached_responses");
        $response = $client->executeQuery(new GetCurrentUsage());

        $this->assertInstanceOf(Quota::class, $response);
    }
    */
}
