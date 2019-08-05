<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use stdClass;

/**
 * Class UltravioletIndex
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class UltravioletIndex extends Entity implements Response
{
    /**
     * @var City|null
     */
    private $city = null;

    /**
     * @var array
     */
    private $uvi = [];

    /**
     * UltravioletIndex constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $cityId        = $this->getPropertyData($data, 'ine');
        $cityName      = $this->getPropertyData($data, 'nom');
        $cityIsCapital = $this->getPropertyData($data, 'capital');
        $cityCountyId  = $this->getPropertyData($data, 'comarca');

        $city = new stdClass();

        if ($cityId !== null) {
            $city->codi = $cityId;
        }

        if ($cityName !== null) {
            $city->nom = $cityName;
        }

        if ($cityIsCapital !== null) {
            $city->capital = $cityIsCapital;
        }

        if ($cityCountyId !== null) {
            $county        = new stdClass();
            $county->codi  = $cityCountyId;
            $city->comarca = $county;
        }

        if (!empty((array)$city)) {
            $this->city = new City($city);
        }

        $uviDays = $this->getPropertyData($data, 'uvi');
        if (is_array($uviDays)) {
            foreach ($uviDays as $day) {
                $this->uvi[] = new UviDay((object)$day);
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
    public function getUvi(): array
    {
        return $this->uvi;
    }
}
