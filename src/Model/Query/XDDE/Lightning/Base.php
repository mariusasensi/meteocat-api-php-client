<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XDDE\Lightning;

use Meteocat\Model\Query\XDDE\Xdde;

/**
 * Class Lightning\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/xarxa-de-deteccio-de-descarregues-electriques/
 * @package Meteocat\Model\Query\XDDE\Lightning
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xdde
{
    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Lightning';
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl();
    }

    /**
     * @return mixed
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
