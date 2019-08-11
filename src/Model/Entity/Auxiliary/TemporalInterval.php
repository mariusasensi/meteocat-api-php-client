<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use DateTime;
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
        $this->dateStart = $this->getPropertyDataAsDate($data, 'dataInici');
        $this->dateEnd = $this->getPropertyDataAsDate($data, 'dataFi');
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
