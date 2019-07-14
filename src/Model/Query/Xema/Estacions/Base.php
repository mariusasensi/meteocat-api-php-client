<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Estacions;

use Meteocat\Model\Query\Xema\Xema;

/**
 * Class Estacions\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/
 * @package Meteocat\Model\Query\Xema\Estacions
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
        return parent::getName() . '/Estacions';
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
