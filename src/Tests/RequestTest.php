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
        if ($_SERVER['SKIP_REQUEST_TESTS'] === true) {
            $this->markTestSkipped('Skipped by configuration');
        }

        $this->expectException(InvalidCredentials::class);

        $client = new Meteocat('InvalidToken!');
        $client
            ->enableDebugMode()
            ->executeQuery(new GetCurrentUsage()); // Bum!
    }
}
