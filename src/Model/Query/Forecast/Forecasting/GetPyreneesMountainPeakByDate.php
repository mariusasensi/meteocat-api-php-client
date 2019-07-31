<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

use Datetime;

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
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{slug}', $this->peak, $uri);
        $uri = str_replace('{any}', $this->date->format('Y'), $uri);
        $uri = str_replace('{mes}', $this->date->format('m'), $uri);
        $uri = str_replace('{dia}', $this->date->format('d'), $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . $this->generateUri();
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
     * @return string
     */
    public function __toString() : string
    {
        return $this->getName();
    }
}
