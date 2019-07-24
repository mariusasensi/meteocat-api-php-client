<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Quota\Information;

use Meteocat\Model\Query\Quota\Quota;

/**
 * Class Information\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/quotes/
 * @package Meteocat\Model\Query\Quota\Information
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Quota
{
    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Information';
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
