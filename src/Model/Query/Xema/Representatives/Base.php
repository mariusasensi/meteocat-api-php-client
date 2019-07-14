<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Representatives;

use Meteocat\Model\Query\Xema\Xema;

/**
 * Class Representatives\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/
 * @package Meteocat\Model\Query\Xema\Representatives
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xema
{
    private const URI = '/representatives/metadades';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Representatives';
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
