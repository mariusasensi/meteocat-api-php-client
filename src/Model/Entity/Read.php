<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use DateTime;
use DateTimeZone;
use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class StationNetwork
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Read extends Entity
{
    /**
     * @var Datetime|null
     */
    private $date = null;

    /**
     * @var float
     */
    private $value = 0;

    /**
     * @var string|null
     */
    private $status = null;

    /**
     * @var string|null
     */
    private $timeBase = null;

    /**
     * StationNetwork constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->value = $this->getPropertyData($data, 'valor', 0);
        $this->status = $this->getPropertyData($data, 'estat');
        $this->timeBase = $this->getPropertyData($data, 'baseHoraria');

        $date = $this->getPropertyData($data, 'data');
        if ($date !== null) {
            $this->date = DateTime::createFromFormat('Y-m-d\TH:i\Z', $date, new DateTimeZone('UTC'));
        }
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getTimeBase(): ?string
    {
        return $this->timeBase;
    }
}
