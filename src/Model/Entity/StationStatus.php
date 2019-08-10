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
final class StationStatus extends Entity
{
    /**
     * @var int
     */
    private $code = 0;

    /**
     * @var Datetime|null
     */
    private $dateStart = null;

    /**
     * @var Datetime|null
     */
    private $dateEnd = null;

    /**
     * StationNetwork constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code = $this->getPropertyData($data, 'codi', 0);

        $dateStart = $this->getPropertyData($data, 'dataInici');
        if ($dateStart !== null) {
            $this->dateStart = DateTime::createFromFormat('Y-m-d\TH:i\Z', $dateStart, new DateTimeZone('UTC'));
        }

        $dateEnd = $this->getPropertyData($data, 'dataFi');
        if ($dateEnd !== null) {
            $this->dateEnd = DateTime::createFromFormat('Y-m-d\TH:i\Z', $dateEnd, new DateTimeZone('UTC'));
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
     * @return DateTime|null
     */
    public function getDateStart(): ?DateTime
    {
        return $this->dateStart;
    }

    /**
     * @return DateTime|null
     */
    public function getDateEnd(): ?DateTime
    {
        return $this->dateEnd;
    }
}
