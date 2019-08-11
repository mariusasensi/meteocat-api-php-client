<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastPyreneesVariable
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastPyreneesVariable extends Entity
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var string|null
     */
    private $value = null;

    /**
     * @var int
     */
    private $period = 0;

    /**
     * ForecastPyreneesVariable constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->name   = $this->getPropertyData($data, 'nom');
        $this->value  = $this->getPropertyData($data, 'valor');
        $this->period = $this->getPropertyData($data, 'periode', 0);
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
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }
}
