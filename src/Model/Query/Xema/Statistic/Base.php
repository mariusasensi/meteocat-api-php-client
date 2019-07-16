<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Statistic;

use Meteocat\Model\Query\Xema\Xema;

/**
 * Class Statistic\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/
 * @package Meteocat\Model\Query\Xema\Statistic
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xema
{
    private const URI = '/variables/estadistics';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Statistic';
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
