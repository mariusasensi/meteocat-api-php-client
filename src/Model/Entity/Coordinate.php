<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class Coordinate
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Coordinate extends Entity
{
    /**
     * @var float
     */
    private $latitude = 0;

    /**
     * @var float
     */
    private $longitude = 0;

    /**
     * Coordinate constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->latitude  = (float)(string)$this->getPropertyData($data, 'latitud', 0);
        $this->longitude = (float)(string)$this->getPropertyData($data, 'longitud', 0);
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
