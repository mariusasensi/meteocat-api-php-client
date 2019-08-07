<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastSymbol
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastSymbol extends Entity
{
    /**
     * @var array
     */
    private $sky = [];

    /**
     * @var array
     */
    private $sea = [];

    /**
     * @var array
     */
    private $wind = [];

    /**
     * ForecastSymbol constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $skies = $this->getPropertyData($data, 'estatDelCel');
        if (is_array($skies)) {
            foreach ($skies as $sky) {
                $this->sky[] = new ForecastSymbolCommon((object)$sky);
            }
        }

        $seas = $this->getPropertyData($data, 'estatDelMar');
        if (is_array($seas)) {
            foreach ($seas as $sea) {
                $this->sea[] = new ForecastSymbolCommon((object)$sea);
            }
        }

        $winds = $this->getPropertyData($data, 'vent');
        if (is_array($winds)) {
            foreach ($winds as $wind) {
                $this->wind[] = new ForecastSymbolWind((object)$wind);
            }
        }
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
    public function getSea(): array
    {
        return $this->sea;
    }

    /**
     * @return array
     */
    public function getWind(): array
    {
        return $this->wind;
    }
}
