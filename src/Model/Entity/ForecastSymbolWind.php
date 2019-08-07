<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastSymbolWind
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastSymbolWind extends Entity
{
    /**
     * @var int
     */
    private $direction = 0;

    /**
     * @var string|null
     */
    private $velocity = null;

    /**
     * @var string|null
     */
    private $beaufort = null;

    /**
     * @var Coordinate|null
     */
    private $coordinate = null;

    /**
     * ForecastSymbolWind constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->direction = $this->getPropertyData($data, 'direccio', 0);
        $this->velocity  = $this->getPropertyData($data, 'velocitat');
        $this->beaufort  = $this->getPropertyData($data, 'beaufort');

        $coordinates = $this->getPropertyData($data, 'coordenades');
        if ($coordinates !== null) {
            $this->coordinate = new Coordinate((object)$coordinates);
        }
    }

    /**
     * @return int
     */
    public function getDirection(): int
    {
        return $this->direction;
    }

    /**
     * @return string|null
     */
    public function getVelocity(): ?string
    {
        return $this->velocity;
    }

    /**
     * @return string|null
     */
    public function getBeaufort(): ?string
    {
        return $this->beaufort;
    }

    /**
     * @return Coordinate|null
     */
    public function getCoordinate(): ?Coordinate
    {
        return $this->coordinate;
    }
}
