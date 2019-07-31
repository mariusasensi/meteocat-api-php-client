<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Auxiliary;

use Meteocat\Model\Query\XEMA\Xema;

/**
 * Class Auxiliary\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/
 * @package Meteocat\Model\Query\XEMA\Auxiliary
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xema
{
    private const URI = '/variables/auxiliars';

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . self::URI;
    }
}
