<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

use Meteocat\Model\Entity\Alert;

/**
 * Class GetCurrentAlerts
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#situacions-meteorologiques-de-perill-preavisos
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetCurrentAlerts extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/smp/episodis-oberts/preavisos';

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return parent::getUrl() . self::URI;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->clear($this->getUrl());
    }

    /**
     * @return string
     */
    public function getResponseClass(): string
    {
        return Alert::class;
    }

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
