<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast;

use Meteocat\Model\Query\Query;

/**
 * Class Forecast
 *
 * @link    https://apidocs.meteocat.gencat.cat/section/referencia-tecnica/operacions/xdde/
 * @package Meteocat\Model\Query\Forecast
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Forecast implements Query
{
    /**
     * Endpoint name.
     */
    protected const NAME = 'pronostic';

    /**
     * Endpoint version.
     */
    protected const VERSION = 1;

    /**
     * @return string
     */
    public function getName() : string
    {
        return 'Forecast';
    }

    public function getResponseClass() : string
    {
        // TODO!
        return "";
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return sprintf('%s/%s/v%s', Query::BASE_URL, self::NAME, self::VERSION);
    }
}
