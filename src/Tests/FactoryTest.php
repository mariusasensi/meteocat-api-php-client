<?php

declare(strict_types=1);

use Meteocat\Model\Entity\Quota;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\Quota\Information\GetCurrentUsage;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testFactoryQuota()
    {
        // Load from file.
        $mockResponse = file_get_contents(__DIR__ . '/.cached_responses/response.api.meteo.cat.quotes.v1.consum-actual.json');

        /** @var Quota $entityResponse */
        $entityResponse = Builder::create((new GetCurrentUsage())->getResponseClass(), $mockResponse);

        $this->assertInstanceOf(Quota::class, $entityResponse);
        $this->assertInstanceOf(Quota\Client::class, $entityResponse->getClient());
        $this->assertEquals("Màrius Asensi Jordà", $entityResponse->getClient()->getName());
        $this->assertIsArray($entityResponse->getPlans());
        $plans = $entityResponse->getPlans();

        /** @var Quota\Plan $firstPlan */
        $firstPlan = current($plans);

        $this->assertEquals("XDDE_250", $firstPlan->getName());
        $this->assertEquals("Mensual", $firstPlan->getPeriod());
        $this->assertEquals("250", $firstPlan->getRequestsMax());
        $this->assertEquals("0", $firstPlan->getRequestsRealised());
        $this->assertEquals("250", $firstPlan->getRequestsRemaining());

        /** @var Quota\Plan $secondPlan */
        $secondPlan = next($plans);

        $this->assertEquals("Predicció_100", $secondPlan->getName());
        $this->assertEquals("Mensual", $secondPlan->getPeriod());
        $this->assertEquals("100", $secondPlan->getRequestsMax());
        $this->assertEquals("0", $secondPlan->getRequestsRealised());
        $this->assertEquals("100", $secondPlan->getRequestsRemaining());

        /** @var Quota\Plan $thirdPlan */
        $thirdPlan = next($plans);

        $this->assertEquals("XEMA_750", $thirdPlan->getName());
        $this->assertEquals("Mensual", $thirdPlan->getPeriod());
        $this->assertEquals("750", $thirdPlan->getRequestsMax());
        $this->assertEquals("1", $thirdPlan->getRequestsRealised());
        $this->assertEquals("749", $thirdPlan->getRequestsRemaining());
    }
}
