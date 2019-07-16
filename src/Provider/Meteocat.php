<?php

declare(strict_types=1);

namespace Meteocat\Provider;

use GuzzleHttp;
use Meteocat\Http\Client;

/**
 * Class Meteocat
 *
 * @package Meteocat\Model
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Meteocat extends Client
{
    /**
     * Meteocat constructor.
     *
     * @param GuzzleHttp\ClientInterface|null $httpClient
     */
    protected function __construct(GuzzleHttp\ClientInterface $httpClient = null)
    {
        parent::__construct($httpClient);
    }
}
