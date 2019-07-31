<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

use Datetime;

/**
 * Class GetCountyByDate
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-comarcal-de-catalunya
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetCountyByDate extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/comarcal/{any}/{mes}/{dia}';

    /**
     * @var Datetime|null
     */
    private $date = null;

    /**
     * GetCountyByDate constructor.
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
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{any}', $this->date->format('Y'), $uri);
        $uri = str_replace('{mes}', $this->date->format('m'), $uri);
        $uri = str_replace('{dia}', $this->date->format('d'), $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->clear($this->getUrl());
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . $this->generateUri();
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
