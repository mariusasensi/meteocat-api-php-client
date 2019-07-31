<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class Coordinate
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Coordinate
{
    /**
     * @var float|null
     */
    private $latitude = null;

    /**
     * @var float|null
     */
    private $longitude = null;

    /**
     * Coordinate constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->latitude  = (float)$data->latitud;
        $this->longitude = (float)$data->longitud;
    }

    /**
     * @return float|null
     */
    public function getLatitude() : ?float
    {
        return $this->latitude;
    }

    /**
     * @return float|null
     */
    public function getLongitude() : ?float
    {
        return $this->longitude;
    }
}
