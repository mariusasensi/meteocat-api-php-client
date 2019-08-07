<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastVariable
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastVariable extends Entity
{
    /**
     * @var string|null
     */
    private $sky = null;

    /**
     * @var string|null
     */
    private $rain = null;

    /**
     * @var string|null
     */
    private $temperature = null;

    /**
     * @var string|null
     */
    private $visibility = null;

    /**
     * @var string|null
     */
    private $wind = null;

    /**
     * ForecastVariable constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->sky         = $this->getPropertyData($data, 'estatDelCel');
        $this->rain        = $this->getPropertyData($data, 'precipitacions');
        $this->temperature = $this->getPropertyData($data, 'temperatures');
        $this->visibility  = $this->getPropertyData($data, 'visibilitat');
        $this->wind        = $this->getPropertyData($data, 'vent');
    }

    /**
     * @return string|null
     */
    public function getSky(): ?string
    {
        return $this->sky;
    }

    /**
     * @return string|null
     */
    public function getRain(): ?string
    {
        return $this->rain;
    }

    /**
     * @return string|null
     */
    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    /**
     * @return string|null
     */
    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    /**
     * @return string|null
     */
    public function getWind(): ?string
    {
        return $this->wind;
    }
}
