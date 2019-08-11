<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Entity\Station;
use Meteocat\Model\Entity\Variable;
use stdClass;

/**
 * Class VariableCity
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class VariableCity extends Entity
{
    /**
     * @var Variable|null
     */
    private $variable = null;

    /**
     * @var array
     */
    private $stations = [];

    /**
     * CityStation constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $variable = $this->getPropertyData($data, 'codi');
        if ($variable !== null) {
            $variableObj = new stdClass();
            $variableObj->codi = $variable;

            $this->variable = new Variable((object)$variableObj);
        }

        $stations = $this->getPropertyData($data, 'estacions');
        if (is_array($stations)) {
            foreach ($stations as $station) {
                $this->stations[] = new Station((object)$station);
            }
        }
    }

    /**
     * @return Variable|null
     */
    public function getVariable(): ?Variable
    {
        return $this->variable;
    }

    /**
     * @return array
     */
    public function getStations(): array
    {
        return $this->stations;
    }
}
