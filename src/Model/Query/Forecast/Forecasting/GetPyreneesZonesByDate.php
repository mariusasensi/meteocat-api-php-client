<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

use Datetime;
use Meteocat\Model\Entity\Auxiliary\ForecastPyrenees;

/**
 * Class GetPyreneesZonesByDate
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-de-zones-del-pirineu
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetPyreneesZonesByDate extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/pirineu/{any}/{mes}/{dia}';

    /**
     * @var Datetime|null
     */
    private $date = null;

    /**
     * GetPyreneesZonesByDate constructor.
     *
     * @param Datetime $date Requested date.
     */
    public function __construct(DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    private function generateUri(): string
    {
        return str_replace(
            ['{any}', '{mes}', '{dia}'],
            [$this->date->format('Y'), $this->date->format('m'), $this->date->format('d')],
            self::URI
        );
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return parent::getUrl() . $this->generateUri();
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
        return ForecastPyrenees::class;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
