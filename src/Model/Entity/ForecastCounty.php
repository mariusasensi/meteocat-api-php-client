<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use Meteocat\Model\Entity\Auxiliary\ForecastCountyPart;
use Meteocat\Model\Entity\Auxiliary\ForecastCountyTemperature;
use stdClass;

/**
 * Class ForecastCounty
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCounty extends Entity implements Response
{
    /**
     * @var ForecastCountyPart|null
     */
    private $morning = null;

    /**
     * @var ForecastCountyPart|null
     */
    private $afternoon = null;

    /**
     * @var array
     */
    private $maximum = [];

    /**
     * @var array
     */
    private $minimum = [];

    /**
     * ForecastCounty constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $morning = $this->getPropertyData($data, 'mati');
        if ($morning !== null) {
            $this->morning = new ForecastCountyPart('morning', (object)$morning);
        }

        $afternoon = $this->getPropertyData($data, 'tarda');
        if ($afternoon !== null) {
            $this->afternoon = new ForecastCountyPart('afternoon', (object)$afternoon);
        }

        $maximums = $this->getPropertyData($data, 'maximes');
        if (is_array($maximums)) {
            foreach ($maximums as $maximum) {
                $this->maximum[] = new ForecastCountyTemperature((object)$maximum);
            }
        }

        $minimums = $this->getPropertyData($data, 'minimes');
        if (is_array($minimums)) {
            foreach ($minimums as $minimum) {
                $this->minimum[] = new ForecastCountyTemperature((object)$minimum);
            }
        }
    }

    /**
     * @return ForecastCountyPart|null
     */
    public function getMorning(): ?ForecastCountyPart
    {
        return $this->morning;
    }

    /**
     * @return ForecastCountyPart|null
     */
    public function getAfternoon(): ?ForecastCountyPart
    {
        return $this->afternoon;
    }

    /**
     * @return array
     */
    public function getMaximum(): array
    {
        return $this->maximum;
    }

    /**
     * @return array
     */
    public function getMinimum(): array
    {
        return $this->minimum;
    }
}
