<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema;

use Meteocat\Model\Query\Query;

/**
 * Class Xema
 *
 * @link    https://apidocs.meteocat.gencat.cat/section/referencia-tecnica/operacions/xema/
 * @package Meteocat\Model\Query\Xema
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Xema implements Query
{
    /**
     * Endpoint name.
     */
    private const NAME    = 'xema';

    /**
     * Endpoint version.
     */
    private const VERSION = 1;

    /**
     * @return string
     */
    public function getName() : string
    {
        return 'XEMA';
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return sprintf('%s/%s/v%s', Query::BASE_URL, self::NAME, self::VERSION);
    }
}
