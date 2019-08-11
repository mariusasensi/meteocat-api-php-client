<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use Meteocat\Model\Entity\Auxiliary\Coordinate;
use Meteocat\Model\Entity\Auxiliary\Region;
use Meteocat\Model\Entity\Auxiliary\StationNetwork;
use Meteocat\Model\Entity\Auxiliary\StationStatus;
use stdClass;

/**
 * Class Station
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Station extends Entity implements Response
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
     * @var string|null
     */
    private $type = null;

    /**
     * @var Coordinate|null
     */
    private $coordinate = null;

    /**
     * @var City|null
     */
    private $city = null;

    /**
     * @var County|null
     */
    private $county = null;

    /**
     * @var string|null
     */
    private $site = null;

    /**
     * @var int
     */
    private $altitude = 0;

    /**
     * @var Region|null
     */
    private $region = null;

    /**
     * @var StationNetwork|null
     */
    private $network = null;

    /**
     * @var array
     */
    private $statuses = [];

    /**
     * @var int|null
     */
    private $order = null;

    /**
     * Station constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code = $this->getPropertyData($data, 'codi');
        $this->name = $this->getPropertyData($data, 'nom');
        $this->type = $this->getPropertyData($data, 'tipus');
        $this->site = $this->getPropertyData($data, 'emplacament');
        $this->altitude = $this->getPropertyData($data, 'altitud', 0);
        $this->order = $this->getPropertyData($data, 'ordre');

        $coordinates = $this->getPropertyData($data, 'coordenades');
        if ($coordinates !== null) {
            $this->coordinate = new Coordinate((object)$coordinates);
        }

        $city = $this->getPropertyData($data, 'municipi');
        if ($city !== null) {
            $this->city = new City((object)$city);
        }

        $county = $this->getPropertyData($data, 'comarca');
        if ($county !== null) {
            $this->county = new County((object)$county);
        }

        $region = $this->getPropertyData($data, 'provincia');
        if ($region !== null) {
            $this->region = new Region((object)$region);
        }

        $network = $this->getPropertyData($data, 'xarxa');
        if ($network !== null) {
            $this->network = new StationNetwork((object)$network);
        }

        $statuses = $this->getPropertyData($data, 'estats');
        if (is_array($statuses)) {
            foreach ($statuses as $status) {
                $this->statuses[] = new StationStatus((object)$status);
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
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return Coordinate|null
     */
    public function getCoordinate(): ?Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @return City|null
     */
    public function getCity(): ?City
    {
        return $this->city;
    }

    /**
     * @return County|null
     */
    public function getCounty(): ?County
    {
        return $this->county;
    }

    /**
     * @return string|null
     */
    public function getSite(): ?string
    {
        return $this->site;
    }

    /**
     * @return int
     */
    public function getAltitude(): int
    {
        return $this->altitude;
    }

    /**
     * @return Region|null
     */
    public function getRegion(): ?Region
    {
        return $this->region;
    }

    /**
     * @return StationNetwork|null
     */
    public function getNetwork(): ?StationNetwork
    {
        return $this->network;
    }

    /**
     * @return array
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }

    /**
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }
}
