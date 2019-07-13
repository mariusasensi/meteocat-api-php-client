<?php

declare(strict_types=1);

namespace Meteocat\Model;

use GuzzleHttp;
use Meteocat\Http\Client;

/**
 * Class Meteocat
 *
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 * @package Meteocat\Model
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
