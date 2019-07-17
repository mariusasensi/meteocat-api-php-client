<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Measurement;

use Meteocat\Model\Query\XEMA\Xema;

/**
 * Class Measurement\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/
 * @package Meteocat\Model\Query\XEMA\Measurement
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xema
{
    private const URI = '/variables/mesurades';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Measurement';
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . self::URI;
    }

    /**
     * @return mixed
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
