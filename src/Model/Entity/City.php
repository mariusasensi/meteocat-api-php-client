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
     * @var array
     */
    private $lightningDischarges = [];

    /**
     * City constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code       = (string)$data->codi;
        $this->name       = (string)$data->nom;
        $this->coordinate = isset($data->coordenades) ? new Coordinate((object)$data->coordenades) : null;
        $this->county     = isset($data->comarca) ? new County((object)$data->comarca) : null;

        if (isset($data->descarregues)) {
            foreach ($data->descarregues as $discharges) {
                $this->lightningDischarges[] = new LightningDischarge((object)$discharges);
            }
        }
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return Coordinate|null
     */
    public function getCoordinate(): ?Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @return County|null
     */
    public function getCounty(): ?County
    {
        return $this->county;
    }

    /**
     * @return array
     */
    public function getLightningDischarges(): array
    {
        return $this->lightningDischarges;
    }
}
