<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use DateTime;
use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class Notice
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Affectation extends Entity
{
    /**
     * @var DateTime|null
     */
    private $day = null;

    /**
     * @var string|null
     */
    private $threshold = null;

    /**
     * @var bool
     */
    private $auxiliary = false;

    /**
     * @var int|null
     */
    private $warning = null;

    /**
     * @var County|null
     */
    private $county = null;

    /**
     * @var int|null
     */
    private $level = null;

    /**
     * Affectation constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->threshold = $this->getPropertyData($data, 'llindar');
        $this->warning = $this->getPropertyData($data, 'perill');
        $this->level = $this->getPropertyData($data, 'nivell');
        $this->day = $this->getPropertyDataAsDate($data, 'dia');

        $auxiliary = $this->getPropertyData($data, 'auxiliar');
        if ($auxiliary !== null) {
            $this->auxiliary = $auxiliary;
        }

        $countyId = $this->getPropertyData($data, 'idComarca');
        if ($countyId !== null) {
            $county       = new stdClass();
            $county->codi = $countyId;
            $this->county = new County((object)$county);
        }
    }

    /**
     * @return DateTime|null
     */
    public function getDay(): ?DateTime
    {
        return $this->day;
    }

    /**
     * @return string|null
     */
    public function getThreshold(): ?string
    {
        return $this->threshold;
    }

    /**
     * @return bool
     */
    public function isAuxiliary(): bool
    {
        return $this->auxiliary;
    }

    /**
     * @return int|null
     */
    public function getWarning(): ?int
    {
        return $this->warning;
    }

    /**
     * @return County|null
     */
    public function getCounty(): ?County
    {
        return $this->county;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }
}
