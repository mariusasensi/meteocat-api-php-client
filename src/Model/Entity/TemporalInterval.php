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
final class TemporalInterval extends Entity
{
    /**
     * @var string|null
     */
    private $code = null;

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
     * @return string|null
     */
    public function getCode(): ?string
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
