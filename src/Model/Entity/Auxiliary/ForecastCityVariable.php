<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastCounty
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCityVariable extends Entity
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var string|null
     */
    private $unit = null;

    /**
     * @var float
     */
    private $value = 0;

    /**
     * ForecastCityVariable constructor.
     *
     * @param string   $name
     * @param stdClass $data
     */
    public function __construct(string $name, stdClass $data)
    {
        $this->name = $name;
        $this->unit = $this->getPropertyData($data, 'unitat');
        $this->value = $this->getPropertyData($data, 'valor');
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
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
