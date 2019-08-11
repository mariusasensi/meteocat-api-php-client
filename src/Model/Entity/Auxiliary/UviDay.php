<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use DateTime;
use stdClass;

/**
 * Class UviDay
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class UviDay extends Entity
{
    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * @var array
     */
    private $uviHours = [];

    /**
     * UviDay constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $date = $this->getPropertyData($data, 'date');
        if ($date !== null) {
            $this->date = DateTime::createFromFormat('Y-m-d', $date);
        }

        $uviHours = $this->getPropertyData($data, 'hours');
        if (is_array($uviHours)) {
            foreach ($uviHours as $hour) {
                $this->uviHours[] = new UviHour((object)$hour);
            }
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
     * @return array
     */
    public function getUviHours(): array
    {
        return $this->uviHours;
    }
}
