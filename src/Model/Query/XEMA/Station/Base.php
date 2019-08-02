<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Station;

use Meteocat\Model\Query\XEMA\Xema;

/**
 * Class Station\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/
 * @package Meteocat\Model\Query\XEMA\Station
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xema
{
    /**
     * Partial endpoint.
     */
    private const URI = '/estacions';

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return parent::getUrl() . self::URI;
    }
}
