<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class Ellipse
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Ellipse
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
     * @var float|int
     */
    private $angle = 0;

    /**
     * Ellipse constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->majorAxis = (int)$data->eixMajor;
        $this->minorAxis = (int)$data->eixMenor;
        $this->angle = (float)$data->angle;
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
     * @return float|int
     */
    public function getAngle()
    {
        return $this->angle;
    }
}
