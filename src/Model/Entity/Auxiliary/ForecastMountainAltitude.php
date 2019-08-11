<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Entity\Variable;
use stdClass;

/**
 * Class ForecastMountainAltitude
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastMountainAltitude extends Entity
{
    /**
     * @var string|null
     */
    private $altitude = null;

    /**
     * @var array
     */
    private $variables = [];

    /**
     * ForecastMountainAltitude constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->altitude = $this->getPropertyData($data, 'cota');

        $variables = $this->getPropertyData($data, 'variables');
        if (is_array($variables)) {
            foreach ($variables as $variable) {
                $this->variables[] = new Variable((object)$variable);
            }
        }
    }

    /**
     * @return string|null
     */
    public function getAltitude(): ?string
    {
        return $this->altitude;
    }

    /**
     * @return array
     */
    public function getVariables(): array
    {
        return $this->variables;
    }
}
