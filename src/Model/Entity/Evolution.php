<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;
use Datetime;
use DateTimeZone;

/**
 * Class Notice
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Evolution extends Entity
{
    /**
     * @var DateTime|null
     */
    private $day = null;

    /**
     * @var string|null
     */
    private $comment = null;

    /**
     * @var int|null
     */
    private $representative = 0;

    /**
     * @var string|null
     */
    private $threshold1 = null;

    /**
     * @var string|null
     */
    private $threshold2 = null;

    /**
     * @var string|null
     */
    private $geographicalDistribution = null;

    /**
     * @var string|null
     */
    private $maximumValue = null;

    /**
     * @var array
     */
    private $periods = [];

    /**
     * Evolution constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->representative           = $this->getPropertyData($data, 'representatiu', 0);
        $this->comment                  = $this->getPropertyData($data, 'comentari');
        $this->threshold1               = $this->getPropertyData($data, 'llindar1');
        $this->threshold2               = $this->getPropertyData($data, 'llindar2');
        $this->geographicalDistribution = $this->getPropertyData($data, 'distribucioGeografica');
        $this->maximumValue             = $this->getPropertyData($data, 'valorMaxim');

        $day = $this->getPropertyData($data, 'dia');
        if ($day !== null) {
            $this->day = DateTime::createFromFormat('Y-m-d\TH:i\Z', $day, new DateTimeZone('UTC'));
        }

        $periods = $this->getPropertyData($data, 'periodes');
        if (is_array($periods)) {
            foreach ($periods as $period) {
                $this->periods[] = new Period((object)$period);
            }
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
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return int|null
     */
    public function getRepresentative(): ?int
    {
        return $this->representative;
    }

    /**
     * @return string|null
     */
    public function getThreshold1(): ?string
    {
        return $this->threshold1;
    }

    /**
     * @return string|null
     */
    public function getThreshold2(): ?string
    {
        return $this->threshold2;
    }

    /**
     * @return string|null
     */
    public function getGeographicalDistribution(): ?string
    {
        return $this->geographicalDistribution;
    }

    /**
     * @return string|null
     */
    public function getMaximumValue(): ?string
    {
        return $this->maximumValue;
    }

    /**
     * @return array
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }
}
