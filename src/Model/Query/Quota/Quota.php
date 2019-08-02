<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Quota;

use Meteocat\Model\Query\Base;
use Meteocat\Model\Query\Query;

/**
 * Class Quota
 *
 * @link    https://apidocs.meteocat.gencat.cat/section/referencia-tecnica/operacions/quotes-operacions/
 * @package Meteocat\Model\Query\Quota
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Quota extends Base
{
    /**
     * Endpoint name.
     */
    protected const NAME = 'quotes';

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
