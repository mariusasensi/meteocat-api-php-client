<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Station;

use Meteocat\Model\Query\Xema\Xema;

/**
 * Class Station\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/
 * @package Meteocat\Model\Query\Xema\Station
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xema
{
    private const URI = '/estacions';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Station';
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
