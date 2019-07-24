<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

/**
 * Class GetPyreneesMountainPeakMetadata
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#metadades-de-pics-del-pirineu
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetPyreneesMountainPeakMetadata extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/pirineu/pics/metadades';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/GetPyreneesMountainPeakMetadata';
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
