<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Datetime;
use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastCounty
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCityDay extends Entity
{
    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * @var ForecastCityVariable|null
     */
    private $temperatureMaximum = null;

    /**
     * @var ForecastCityVariable|null
     */
    private $temperatureMinimum = null;

    /**
     * @var ForecastCityVariable|null
     */
    private $rain = null;

    /**
     * @var ForecastCityVariable|null
     */
    private $sky = null;

    /**
     * ForecastCityDay constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->date = $this->getPropertyDataAsDate($data, 'data');
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
