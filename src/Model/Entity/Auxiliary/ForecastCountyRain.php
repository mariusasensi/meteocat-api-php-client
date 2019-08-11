<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Entity\County;
use stdClass;

/**
 * Class ForecastCountyRain
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCountyRain extends Entity
{
    /**
     * @var County|null
     */
    private $county = null;

    /**
     * @var int
     */
    private $chance = 0;

    /**
     * @var int
     */
    private $intensity = 0;

    /**
     * @var int
     */
    private $accumulation = 0;

    /**
     * ForecastCountyRain constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $countyId = $this->getPropertyData($data, 'idComarca');
        if ($countyId !== null) {
            $county       = new stdClass();
            $county->codi = $countyId;
            $this->county = new County((object)$county);
        }

        $chance = $this->getPropertyData($data, 'probabilitat', 0);
        if ($chance !== null) {
            $this->chance = $chance;
        }

        $intensity = $this->getPropertyData($data, 'intensitat', 0);
        if ($intensity !== null) {
            $this->intensity = $intensity;
        }

        $accumulation = $this->getPropertyData($data, 'acumulacio', 0);
        if ($accumulation !== null) {
            $this->accumulation = $accumulation;
        }
    }

    /**
     * @return County|null
     */
    public function getCounty(): ?County
    {
        return $this->county;
    }

    /**
     * @return int
     */
    public function getChance(): int
    {
        return $this->chance;
    }

    /**
     * @return int
     */
    public function getIntensity(): int
    {
        return $this->intensity;
    }

    /**
     * @return int
     */
    public function getAccumulation(): int
    {
        return $this->accumulation;
    }
}
