<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

use Meteocat\Model\Query\Forecast\Forecast;

/**
 * Class Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Forecast
{
    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Forecasting';
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
