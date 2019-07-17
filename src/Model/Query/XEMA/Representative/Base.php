<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Representative;

use Meteocat\Model\Query\XEMA\Xema;

/**
 * Class Representative\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/
 * @package Meteocat\Model\Query\XEMA\Representative
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
        return parent::getName() . '/Representative';
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
