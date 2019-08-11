<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Response;
use Meteocat\Model\Common\Entity;
use Meteocat\Model\Entity\Auxiliary\Read;
use stdClass;

/**
 * Class Stadistic
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Statistic extends Entity implements Response
{
    /**
     * @var Station|null
     */
    private $station = null;

    /**
     * @var Variable|null
     */
    private $variable = null;

    /**
     * @var array
     */
    private $values = [];

    /**
     * Statistic constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $stationCode = $this->getPropertyData($data, 'codiEstacio');
        if ($stationCode !== null) {
            $station = new stdClass();
            $station->codi = $stationCode;

            $this->station = new Station((object)$station);
        }

        $variableCode = $this->getPropertyData($data, 'codiVariable');
        if ($variableCode !== null) {
            $variable = new stdClass();
            $variable->codi = $variableCode;

            $this->variable = new Variable((object)$variable);
        }

        $values = $this->getPropertyData($data, 'valors');
        if (is_array($values)) {
            foreach ($values as $value) {
                $this->values[] = new Read((object)$value);
            }
        }
    }

    /**
     * @return Station|null
     */
    public function getStation(): ?Station
    {
        return $this->station;
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
    public function getValues(): array
    {
        return $this->values;
    }
}
