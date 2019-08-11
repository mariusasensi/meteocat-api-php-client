<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use Meteocat\Model\Entity\Auxiliary\ForecastCityDay;
use stdClass;

/**
 * Class ForecastCounty
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCity extends Entity implements Response
{
    /**
     * @var City|null
     */
    private $city = null;

    /**
     * @var array
     */
    private $days = [];

    /**
     * ForecastCity constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $cityCode = $this->getPropertyData($data, 'codiMunicipi');
        if ($cityCode !== null) {
            $cityObject = new stdClass();
            $cityObject->codi = $cityCode;

            $this->city = new City($cityObject);
        }

        $days = $this->getPropertyData($data, 'dies');
        if (is_array($days)) {
            foreach ($days as $day) {
                $this->days[] = new ForecastCityDay((object)$day);
            }
        }
    }

    /**
     * @return City|null
     */
    public function getCity(): ?City
    {
        return $this->city;
    }

    /**
     * @return array
     */
    public function getDays(): array
    {
        return $this->days;
    }
}
