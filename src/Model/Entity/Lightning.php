<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use DateTime;
use DateTimeZone;
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
     * @var bool|\DateTime|null
     */
    private $date = null;

    /**
     * @var float|int
     */
    private $intensity = 0; // Kilo-Ampere

    /**
     * @var float|int
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
        $this->id           = $this->getPropertyData($data, 'id');
        $this->intensity    = $this->getPropertyData($data, 'correntPic', 0);
        $this->chiSquared   = $this->getPropertyData($data, 'chi2', 0);
        $this->sensorsCount = $this->getPropertyData($data, 'numSensors', 0);
        $this->cloudGround  = $this->getPropertyData($data, 'nuvolTerra', false);

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

        $date = $this->getPropertyData($data, 'data');
        if ($date !== null) {
            $this->date = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $date, new DateTimeZone('UTC'));
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
     * @return bool|\DateTime|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return float|int
     */
    public function getIntensity()
    {
        return $this->intensity;
    }

    /**
     * @return float|int
     */
    public function getChiSquared()
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
