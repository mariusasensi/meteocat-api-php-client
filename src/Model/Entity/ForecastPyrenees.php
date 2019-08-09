<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;
use DateTime;
use DateTimeZone;

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
        $date = $this->getPropertyData($data, 'dataPrediccio');
        if ($date !== null) {
            $this->date = DateTime::createFromFormat('Y-m-d\Z', $date, new DateTimeZone('UTC'));
        }

        $publishedAt = $this->getPropertyData($data, 'dataPublicacio');
        if ($publishedAt !== null) {
            $this->publishedAt = DateTime::createFromFormat('Y-m-d\Th:i\Z', $publishedAt, new DateTimeZone('UTC'));
        }

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
