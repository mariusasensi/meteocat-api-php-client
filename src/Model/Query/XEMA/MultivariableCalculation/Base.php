<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\MultivariableCalculation;

use Meteocat\Model\Query\XEMA\Xema;

/**
 * Class MultivariableCalculation\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/
 * @package Meteocat\Model\Query\XEMA\MultivariableCalculation
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xema
{
    private const URI = '/variables/cmv';

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . self::URI;
    }
}
