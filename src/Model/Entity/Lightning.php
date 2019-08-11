<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use DateTime;
use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use Meteocat\Model\Entity\Auxiliary\Coordinate;
use Meteocat\Model\Entity\Auxiliary\Ellipse;
use stdClass;

/**
 * Class Lightning
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Lightning extends Entity implements Response
{
    /**
     * @var int|null
     */
    private $id = null;

    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * @var float
     */
    private $intensity = 0; // Kilo-Ampere

    /**
     * @var float
     */
    private $chiSquared = 0;

    /**
     * @var Ellipse|null
     */
    private $ellipse = null;

    /**
     * @var int
     */
    private $sensorsCount = 0;

    /**
     * @var bool
     */
    private $cloudGround = false;

    /**
     * @var City|null
     */
    private $city = null;

    /**
     * @var Coordinate|null
     */
    private $coordinate = null;

    /**
     * Lightning constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->id = $this->getPropertyData($data, 'id');
        $this->intensity = $this->getPropertyData($data, 'correntPic', 0);
        $this->chiSquared = $this->getPropertyData($data, 'chi2', 0);
        $this->sensorsCount = $this->getPropertyData($data, 'numSensors', 0);
        $this->cloudGround  = $this->getPropertyData($data, 'nuvolTerra', false);
        $this->date = $this->getPropertyDataAsDate($data, 'data');

        $cityCode = $this->getPropertyData($data, 'idMunicipi');
        if ($cityCode !== null) {
            $cityObject = new stdClass();
            $cityObject->codi = $cityCode;

            $this->city = new City($cityObject);
        }

        $ellipse = $this->getPropertyData($data, 'ellipse');
        if ($ellipse !== null) {
            $this->ellipse = new Ellipse((object)$ellipse);
        }

        $coordinates = $this->getPropertyData($data, 'coordenades');
        if ($coordinates !== null) {
            $this->coordinate = new Coordinate((object)$coordinates);
        }
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @return float
     */
    public function getIntensity(): float
    {
        return $this->intensity;
    }

    /**
     * @return float
     */
    public function getChiSquared(): float
    {
        return $this->chiSquared;
    }

    /**
     * @return Ellipse|null
     */
    public function getEllipse(): ?Ellipse
    {
        return $this->ellipse;
    }

    /**
     * @return int
     */
    public function getSensorsCount(): int
    {
        return $this->sensorsCount;
    }

    /**
     * @return bool
     */
    public function isCloudGround(): bool
    {
        return $this->cloudGround;
    }

    /**
     * @return City|null
     */
    public function getCity(): ?City
    {
        return $this->city;
    }

    /**
     * @return Coordinate|null
     */
    public function getCoordinate(): ?Coordinate
    {
        return $this->coordinate;
    }
}
