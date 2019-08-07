<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastCountyHail
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCountyHail extends Entity
{
    /**
     * @var County|null
     */
    private $county = null;

    /**
     * @var int
     */
    private $level = 0;

    /**
     * ForecastCountyHail constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $countyId = $this->getPropertyData($data, 'idComarca');
        if ($countyId !== null) {
            $county = new stdClass();
            $county->codi = $countyId;
            $this->county = new County((object)$county);
        }

        $this->level = $this->getPropertyData($data, 'nivell', 0);
    }

    /**
     * @return County|null
     */
    public function getCounty(): ?County
    {
        return $this->county;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }
}
