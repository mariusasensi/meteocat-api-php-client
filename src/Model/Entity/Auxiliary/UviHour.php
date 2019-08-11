<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class UviHour
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class UviHour extends Entity
{
    /**
     * @var int
     */
    private $hour = 0;

    /**
     * @var int
     */
    private $uvi = 0;

    /**
     * @var int
     */
    private $uviCloud = 0;

    /**
     * UviHour constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->hour     = $this->getPropertyData($data, 'hour', 0);
        $this->uvi      = $this->getPropertyData($data, 'uvi', 0);
        $this->uviCloud = $this->getPropertyData($data, 'uvi_clouds', 0);
    }

    /**
     * @return int
     */
    public function getHour(): int
    {
        return $this->hour;
    }

    /**
     * @return int
     */
    public function getUvi(): int
    {
        return $this->uvi;
    }

    /**
     * @return int
     */
    public function getUviCloud(): int
    {
        return $this->uviCloud;
    }
}
