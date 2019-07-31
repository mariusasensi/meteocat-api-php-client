<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

/**
 * Class GetPyreneesMountainHuntMetadata
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#metadades-de-refugis-del-pirineu
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetPyreneesMountainHuntMetadata extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/pirineu/refugis/metadades';

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
