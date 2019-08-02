<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XDDE;

use Meteocat\Model\Query\Base;
use Meteocat\Model\Query\Query;

/**
 * Class Xdde
 *
 * @link    https://apidocs.meteocat.gencat.cat/section/referencia-tecnica/operacions/xdde/
 * @package Meteocat\Model\Query\XDDE
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Xdde extends Base
{
    /**
     * Endpoint name.
     */
    protected const NAME = 'xdde';

    /**
     * Endpoint version.
     */
    protected const VERSION = 1;

    /**
     * @return string
     */
    public function getName(): string
    {
        return sprintf('%s.%s.v%s', Query::BASE_URL, self::NAME, self::VERSION);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return sprintf('%s://%s/%s/v%s', Query::DEFAULT_PROTOCOL, Query::BASE_URL, self::NAME, self::VERSION);
    }
}
