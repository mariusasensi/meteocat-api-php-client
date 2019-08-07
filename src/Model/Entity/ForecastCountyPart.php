<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastCountyPart
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastCountyPart extends Entity
{
    /**
     * @var string|null
     */
    private $dayPart = null;

    /**
     * @var array
     */
    private $sky = [];

    /**
     * @var array
     */
    private $hail = [];

    /**
     * @var array
     */
    private $rain = [];

    /**
     * ForecastCountyPart constructor.
     *
     * @param string   $dayPart
     * @param stdClass $data
     */
    public function __construct(string $dayPart, stdClass $data)
    {
        $this->dayPart = $dayPart;

        $skies = $this->getPropertyData($data, 'cel');
        if (is_array($skies)) {
            foreach ($skies as $sky) {
                $this->sky[] = new ForecastCountySky((object)$sky);
            }
        }

        $hails = $this->getPropertyData($data, 'calamarsa');
        if (is_array($hails)) {
            foreach ($hails as $hail) {
                $this->hail[] = new ForecastCountyHail((object)$hail);
            }
        }

        $rains = $this->getPropertyData($data, 'precipitacio');
        if (is_array($rains)) {
            foreach ($rains as $rain) {
                $this->rain[] = new ForecastCountyRain((object)$rain);
            }
        }
    }

    /**
     * @return string|null
     */
    public function getDayPart(): ?string
    {
        return $this->dayPart;
    }

    /**
     * @return array
     */
    public function getSky(): array
    {
        return $this->sky;
    }

    /**
     * @return array
     */
    public function getHail(): array
    {
        return $this->hail;
    }

    /**
     * @return array
     */
    public function getRain(): array
    {
        return $this->rain;
    }
}
