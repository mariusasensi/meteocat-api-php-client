<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

/**
 * Class GetCurrentWarnings
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#situacions-meteorologiques-de-perill-llista-depisodis-oberts
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetCurrentWarnings extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/smp/episodis-oberts';

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . self::URI;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->clear($this->getUrl());
    }

    /**
     * TODO: Entity response class.
     * @return string
     */
    public function getResponseClass() : string
    {
        return "";
    }

    /**
     * @return mixed
     */
    public function __toString() : string
    {
        return $this->getName();
    }
}
