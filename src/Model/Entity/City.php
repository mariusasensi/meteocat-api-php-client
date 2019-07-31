<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class City
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class City extends Response
{
    /**
     * @var string|null
     */
    private $code = null;

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var Coordinate|null
     */
    private $coordinate = null;

    /**
     * @var County|null
     */
    private $county = null;

    /**
     * City constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code       = (string)$data->codi;
        $this->name       = (string)$data->nom;
        $this->coordinate = new Coordinate((object)$data->coordenades);
        $this->county     = new County((object)$data->comarca);
    }

    /**
     * @return string|null
     */
    public function getCode() : ?string
    {
        return $this->code;
    }

    /**
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * @return Coordinate|null
     */
    public function getCoordinate() : ?Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @return County|null
     */
    public function getCounty() : ?County
    {
        return $this->county;
    }
}
