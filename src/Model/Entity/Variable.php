<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use Meteocat\Model\Entity\Auxiliary\Read;
use Meteocat\Model\Entity\Auxiliary\StationStatus;
use Meteocat\Model\Entity\Auxiliary\TemporalInterval;
use stdClass;

/**
 * Class Variable
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Variable extends Entity implements Response
{
    /**
     * @var int
     */
    private $code = 0;

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var int
     */
    private $value = 0;

    /**
     * @var string|null
     */
    private $unit = null;

    /**
     * @var string|null
     */
    private $acronym = null;

    /**
     * @var string|null
     */
    private $type = null;

    /**
     * @var int
     */
    private $decimals = 0;

    /**
     * @var array
     */
    private $statuses = [];

    /**
     * @var array
     */
    private $temporalIntervals = [];

    /**
     * @var array
     */
    private $readings = [];

    /**
     * Variable constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code = $this->getPropertyData($data, 'codi', 0);
        $this->name = $this->getPropertyData($data, 'nom');
        $this->value = $this->getPropertyData($data, 'valor', 0);
        $this->unit = $this->getPropertyData($data, 'unitat');
        $this->acronym = $this->getPropertyData($data, 'acronim');
        $this->type = $this->getPropertyData($data, 'tipus');
        $this->decimals = $this->getPropertyData($data, 'decimals', 0);

        $statuses = $this->getPropertyData($data, 'estats');
        if (is_array($statuses)) {
            foreach ($statuses as $status) {
                $this->statuses[] = new StationStatus((object)$status);
            }
        }

        $temporalIntervals = $this->getPropertyData($data, 'basesTemporals');
        if (is_array($temporalIntervals)) {
            foreach ($temporalIntervals as $temporalInterval) {
                $this->temporalIntervals[] = new TemporalInterval((object)$temporalInterval);
            }
        }

        $readings = $this->getPropertyData($data, 'lectures');
        if (is_array($readings)) {
            foreach ($readings as $reading) {
                $this->readings[] = new Read((object)$reading);
            }
        }
    }

    /**
     * @return int
     */
    public function getCode(): int
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
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @return string|null
     */
    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getDecimals(): int
    {
        return $this->decimals;
    }

    /**
     * @return array
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }

    /**
     * @return array
     */
    public function getTemporalIntervals(): array
    {
        return $this->temporalIntervals;
    }

    /**
     * @return array
     */
    public function getReadings(): array
    {
        return $this->readings;
    }
}
