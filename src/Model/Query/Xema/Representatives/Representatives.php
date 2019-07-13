<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Representatives;

use Meteocat\Model\Query\Xema\Xema;

/**
 * Class Representatives
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/
 * @package Meteocat\Model\Query\Xema
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Representatives extends Xema
{
    private const URI = '/representatives/metadades';

    /**
     * @return string
     */
    public function getType() : string
    {
        return parent::getType() . '/Representatives';
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
