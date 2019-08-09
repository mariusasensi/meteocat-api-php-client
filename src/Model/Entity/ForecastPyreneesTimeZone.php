<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastPyreneesTimeZone
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastPyreneesTimeZone extends Entity
{
    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var array
     */
    private $zones = [];

    /**
     * ForecastPyreneesTimeZone constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->id = $this->getPropertyData($data, 'idTipusFranja', 0);
        $this->name = $this->getPropertyData($data, 'nom');

        $zones = $this->getPropertyData($data, 'zones');
        if (is_array($zones)) {
            foreach ($zones as $zone) {
                $this->zones[] = new PyreneesZone((object)$zone);
            }
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getZones(): array
    {
        return $this->zones;
    }
}
