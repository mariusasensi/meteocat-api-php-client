<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

use Datetime;
use Meteocat\Model\Entity\ForecastMountainPeak;

/**
 * Class GetPyreneesMountainPeakByDate
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-de-pics-del-pirineu
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetPyreneesMountainPeakByDate extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/pirineu/pics/{slug}/{any}/{mes}/{dia}';

    /**
     * @var string|null
     */
    private $peak = null;

    /**
     * @var Datetime|null
     */
    private $date = null;

    /**
     * GetCatalunyaByDate constructor.
     *
     * @param string   $peak Peak code.
     * @param Datetime $date Requested date.
     */
    public function __construct(string $peak, DateTime $date)
    {
        $this->peak = $peak;
        $this->date = $date;
    }

    /**
     * @return string
     */
    private function generateUri(): string
    {
        return str_replace(
            ['{slug}', '{any}', '{mes}', '{dia}'],
            [$this->peak, $this->date->format('Y'), $this->date->format('m'), $this->date->format('d')],
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
        return ForecastMountainPeak::class;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
