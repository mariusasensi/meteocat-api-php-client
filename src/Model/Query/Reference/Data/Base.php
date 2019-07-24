<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Reference\Data;

use Meteocat\Model\Query\Reference\Reference;

/**
 * Class Reference\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/referencia/
 * @package Meteocat\Model\Query\Reference\Data
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Reference
{
    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Data';
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
