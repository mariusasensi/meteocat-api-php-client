<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use DateTime;
use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use Meteocat\Model\Entity\Auxiliary\ForecastMountainAltitude;
use stdClass;

/**
 * Class ForecastMountainHunt
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastMountainHunt extends Entity implements Response
{
    /**
     * @return DateTime|null
     */
    private $date = null;

    /**
     * @return array
     */
    private $altitude = [];

    /**
     * ForecastMountainHunt constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->date = $this->getPropertyDataAsDate($data, 'data');

        $altitudes = $this->getPropertyData($data, 'cotes');
        if (is_array($altitudes)) {
            foreach ($altitudes as $altitude) {
                $this->altitude[] = new ForecastMountainAltitude((object)$altitude);
            }
        }
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?Datetime
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function getAltitude(): array
    {
        return $this->altitude;
    }
}
