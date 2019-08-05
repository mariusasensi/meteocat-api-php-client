<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class Ellipse
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Ellipse extends Entity
{
    /**
     * @var int
     */
    private $majorAxis = 0;

    /**
     * @var int
     */
    private $minorAxis = 0;

    /**
     * @var float
     */
    private $angle = 0;

    /**
     * Ellipse constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->majorAxis = $this->getPropertyData($data, 'eixMajor', 0);
        $this->minorAxis = $this->getPropertyData($data, 'eixMenor', 0);
        $this->angle     = $this->getPropertyData($data, 'angle', 0);
    }

    /**
     * @return int
     */
    public function getMajorAxis(): int
    {
        return $this->majorAxis;
    }

    /**
     * @return int
     */
    public function getMinorAxis(): int
    {
        return $this->minorAxis;
    }

    /**
     * @return float
     */
    public function getAngle(): float
    {
        return $this->angle;
    }
}
