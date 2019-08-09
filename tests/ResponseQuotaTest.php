<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\Quota\Information;
use PHPUnit\Framework\TestCase;

class ResponseQuotaTest extends TestCase
{
    public function testGetCurrentUsage()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.quotes.v1.consum-actual.json');

        /** @var Information\GetCurrentUsage $query */
        $query = new Information\GetCurrentUsage();

        /** @var Entity\Quota $entityResponse */
        $entityResponse = Builder::create($query->getResponseClass(), $mockResponse);
        $this->assertInstanceOf(Entity\Quota::class, $entityResponse);

        /** @var Entity\Client $client */
        $client = $entityResponse->getClient();
        $this->assertInstanceOf(Entity\Client::class, $client);
        $this->assertEquals('Màrius Asensi Jordà', $client->getName());

        /** @var array $plans */
        $plans = $entityResponse->getPlans();
        $this->assertIsArray($plans);

        /** @var Entity\Plan $firstPlan */
        $firstPlan = current($plans);

        $this->assertEquals('XDDE_250', $firstPlan->getName());
        $this->assertEquals('Mensual', $firstPlan->getPeriod());
        $this->assertEquals('250', $firstPlan->getRequestsMax());
        $this->assertEquals('0', $firstPlan->getRequestsRealised());
        $this->assertEquals('250', $firstPlan->getRequestsRemaining());

        /** @var Entity\Plan $secondPlan */
        $secondPlan = next($plans);

        $this->assertEquals('Predicció_100', $secondPlan->getName());
        $this->assertEquals('Mensual', $secondPlan->getPeriod());
        $this->assertEquals('100', $secondPlan->getRequestsMax());
        $this->assertEquals('0', $secondPlan->getRequestsRealised());
        $this->assertEquals('100', $secondPlan->getRequestsRemaining());

        /** @var Entity\Plan $thirdPlan */
        $thirdPlan = next($plans);

        $this->assertEquals('XEMA_750', $thirdPlan->getName());
        $this->assertEquals('Mensual', $thirdPlan->getPeriod());
        $this->assertEquals('750', $thirdPlan->getRequestsMax());
        $this->assertEquals('1', $thirdPlan->getRequestsRealised());
        $this->assertEquals('749', $thirdPlan->getRequestsRemaining());
    }
}
