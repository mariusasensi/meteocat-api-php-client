<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use DateTime;
use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastPyrenees
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastPyrenees extends Entity
{
    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * @var DateTime|null
     */
    private $publishedAt = null;

    /**
     * @var array
     */
    private $timeZones = [];

    /**
     * ForecastPyrenees constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->date = $this->getPropertyDataAsDate($data, 'dataPrediccio');
        $this->publishedAt = $this->getPropertyDataAsDate($data, 'dataPublicacio');

        $timeZones = $this->getPropertyData($data, 'franjes');
        if (is_array($timeZones)) {
            foreach ($timeZones as $zone) {
                $this->timeZones[] = new ForecastPyreneesTimeZone((object)$zone);
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
     * @return DateTime|null
     */
    public function getPublishedAt(): ?DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @return array
     */
    public function getTimeZones(): array
    {
        return $this->timeZones;
    }
}
