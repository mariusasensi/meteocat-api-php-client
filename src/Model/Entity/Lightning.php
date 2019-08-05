<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use DateTime;
use DateTimeZone;
use stdClass;

/**
 * Class Lightning
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Lightning extends Response
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
     * @var string|null
     */
    private $cityId = null;

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
        $this->id           = (int)$data->id;
        $this->date         = DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $data->data, new DateTimeZone('UTC'));
        $this->intensity    = (float)$data->correntPic;
        $this->chiSquared   = (float)$data->chi2;
        $this->ellipse      = new Ellipse($data->ellipse);
        $this->sensorsCount = (int)$data->numSensors;
        $this->cloudGround  = (bool)$data->nuvolTerra;
        $this->cityId       = (string)$data->idMunicipi;
        $this->coordinate   = new Coordinate($data->coordenades);
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
     * @return string|null
     */
    public function getCityId(): ?string
    {
        return $this->cityId;
    }

    /**
     * @return Coordinate|null
     */
    public function getCoordinate(): ?Coordinate
    {
        return $this->coordinate;
    }
}
