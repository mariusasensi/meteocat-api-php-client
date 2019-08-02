<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA;

use Meteocat\Model\Query\Base;
use Meteocat\Model\Query\Query;

/**
 * Class Xema
 *
 * @link    https://apidocs.meteocat.gencat.cat/section/referencia-tecnica/operacions/xema/
 * @package Meteocat\Model\Query\XEMA
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Xema extends Base
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
    public function getUrl(): string
    {
        return sprintf('%s://%s/%s/v%s', Query::DEFAULT_PROTOCOL, Query::BASE_URL, self::NAME, self::VERSION);
    }
}
