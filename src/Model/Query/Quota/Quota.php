<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Quota;

use Meteocat\Model\Query\Query;

/**
 * Class Quota
 *
 * @link    https://apidocs.meteocat.gencat.cat/section/referencia-tecnica/operacions/quotes-operacions/
 * @package Meteocat\Model\Query\Quota
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Quota implements Query
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
    public function getName() : string
    {
        return 'Quotes';
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return sprintf('%s/%s/v%s', Query::BASE_URL, self::NAME, self::VERSION);
    }
}
