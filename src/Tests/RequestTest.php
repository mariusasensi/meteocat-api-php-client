<?php

declare(strict_types=1);

use Meteocat\Model\Exception\InvalidCredentials;
use Meteocat\Model\Query\Quota\Information\GetCurrentUsage;
use Meteocat\Provider\Meteocat;
use PHPUnit\Framework\TestCase;

/*use Meteocat\Model\Query\Forecast\Forecasting as Forecast;*/

class RequestTest extends TestCase
{
    public function testInvalidCredentials()
    {
        $this->expectException(InvalidCredentials::class);

        $client = new Meteocat('InvalidToken!');
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
            ->saveResponse('src/Tests/.cached_responses');

        $date = DateTime::createFromFormat('Y-m-d', '2019-08-06');
        $queries[] = new Forecast\GetCatalunyaByDate($date);

        foreach ($queries as $query) {
            try {
                $response = $client->executeQuery($query);
            } catch (\Exception $e) {
                var_dump(get_class($e));
            }
        }
    }
    */
}
