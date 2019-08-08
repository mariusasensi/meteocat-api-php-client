<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Datetime;
use DateTimeZone;
use stdClass;

/**
 * Class ForecastCounty
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCityDay extends Entity
{
    private $date = null;

    private $temperatureMaximum = null;

    private $temperatureMinimum = null;

    private $rain = null;

    private $sky = null;

    public function __construct(stdClass $data)
    {
        $date = $this->getPropertyData($data, 'data');
        if ($date !== null) {
            $dateTime = DateTime::createFromFormat('Y-m-d\Z', $date, new DateTimeZone('UTC'));
            if ($dateTime !== false) {
                $this->date = $dateTime;
            }
        }

        $variables = $this->getPropertyData($data, 'variables');

        if ($variables !== null) {
            $temperatureMaximum = $this->getPropertyData($variables, 'tmax');
            if ($temperatureMaximum !== null) {
                $this->temperatureMaximum = new ForecastCityVariable('Maximum Temperature', $temperatureMaximum);
            }

            $temperatureMinimum = $this->getPropertyData($variables, 'tmin');
            if ($temperatureMaximum !== null) {
                $this->temperatureMinimum = new ForecastCityVariable('Minimum Temperature', $temperatureMinimum);
            }

            $rain = $this->getPropertyData($variables, 'precipitacio');
            if ($rain !== null) {
                $this->rain = new ForecastCityVariable('Rain', $rain);
            }

            $sky = $this->getPropertyData($variables, 'estatCel');
            if ($rain !== null) {
                $this->sky = new ForecastCityVariable('Sky', $sky);
            }
        }
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @return ForecastCityVariable|null
     */
    public function getTemperatureMaximum(): ?ForecastCityVariable
    {
        return $this->temperatureMaximum;
    }

    /**
     * @return ForecastCityVariable|null
     */
    public function getTemperatureMinimum(): ?ForecastCityVariable
    {
        return $this->temperatureMinimum;
    }

    /**
     * @return ForecastCityVariable|null
     */
    public function getRain(): ?ForecastCityVariable
    {
        return $this->rain;
    }

    /**
     * @return ForecastCityVariable|null
     */
    public function getSky(): ?ForecastCityVariable
    {
        return $this->sky;
    }
}
