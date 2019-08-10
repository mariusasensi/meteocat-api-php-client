<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Response;
use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class City
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class City extends Entity implements Response
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
     * @var bool|null
     */
    private $capital = null;

    /**
     * @var array
     */
    private $representativeStations = [];

    /**
     * City constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code    = $this->getPropertyData($data, 'codi');
        $this->name    = $this->getPropertyData($data, 'nom');
        $this->capital = $this->getPropertyData($data, 'capital');

        $coordinates = $this->getPropertyData($data, 'coordenades');
        if ($coordinates !== null) {
            $this->coordinate = new Coordinate((object)$coordinates);
        }

        $county = $this->getPropertyData($data, 'comarca');
        if ($county !== null) {
            $this->county = new County((object)$county);
        }

        $discharges = $this->getPropertyData($data, 'descarregues');
        if (is_array($discharges)) {
            foreach ($discharges as $discharge) {
                $this->lightningDischarges[] = new LightningDischarge((object)$discharge);
            }
        }

        $representativeStations = $this->getPropertyData($data, 'variables');
        if (is_array($representativeStations)) {
            foreach ($representativeStations as $representativeStation) {
                $this->representativeStations[] = new VariableCity((object)$representativeStation);
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

    /**
     * @return bool|null
     */
    public function isCapital(): ?bool
    {
        return $this->capital;
    }

    /**
     * @return array
     */
    public function getRepresentativeStations(): array
    {
        return $this->representativeStations;
    }
}
