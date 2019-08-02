<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Reference;

use Meteocat\Model\Query\Base;
use Meteocat\Model\Query\Query;

/**
 * Class Reference
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/referencia/
 * @package Meteocat\Model\Query\Reference
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Reference extends Base
{
    /**
     * Endpoint name.
     */
    protected const NAME = 'referencia';

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
