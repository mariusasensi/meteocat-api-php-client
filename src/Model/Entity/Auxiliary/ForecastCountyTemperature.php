<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Entity\County;
use stdClass;

/**
 * Class ForecastCountyTemperature
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCountyTemperature extends Entity
{
    /**
     * @var County|null
     */
    private $county = null;

    /**
     * @var int
     */
    private $temperature = 0;

    /**
     * ForecastCountyTemperature constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $countyId = $this->getPropertyData($data, 'idComarca');
        if ($countyId !== null) {
            $county = new stdClass();
            $county->codi = $countyId;
            $this->county = new County((object)$county);
        }

        $this->temperature = $this->getPropertyData($data, 'temperatura', 0);
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
    public function getTemperature(): int
    {
        return $this->temperature;
    }
}
