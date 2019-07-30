<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA;

use Meteocat\Model\Query\Query;

/**
 * Class Xema
 *
 * @link    https://apidocs.meteocat.gencat.cat/section/referencia-tecnica/operacions/xema/
 * @package Meteocat\Model\Query\XEMA
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Xema implements Query
{
    /**
     * Endpoint name.
     */
    protected const NAME = 'xema';

    /**
     * Endpoint version.
     */
    protected const VERSION = 1;

    /**
     * @return string
     */
    public function getName() : string
    {
        return 'XEMA';
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
