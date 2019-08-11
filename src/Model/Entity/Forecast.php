<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use Meteocat\Model\Entity\Auxiliary\ForecastPart;
use Meteocat\Model\Entity\Auxiliary\ForecastVariable;
use stdClass;

/**
 * Class Forecast
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Forecast extends Entity implements Response
{
    /**
     * @var ForecastPart|null
     */
    private $morning = null;

    /**
     * @var ForecastPart|null
     */
    private $afternoon = null;

    /**
     * @var ForecastVariable|null
     */
    private $variable = null;

    /**
     * Forecast constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $morning = $this->getPropertyData($data, 'mati');
        if ($morning !== null) {
            $this->morning = new ForecastPart('morning', (object)$morning);
        }

        $afternoon = $this->getPropertyData($data, 'tarda');
        if ($afternoon !== null) {
            $this->afternoon = new ForecastPart('afternoon', (object)$afternoon);
        }

        $variable = $this->getPropertyData($data, 'variables');
        if ($variable !== null) {
            $this->variable = new ForecastVariable((object)$variable);
        }
    }

    /**
     * @return ForecastPart|null
     */
    public function getMorning(): ?ForecastPart
    {
        return $this->morning;
    }

    /**
     * @return ForecastPart|null
     */
    public function getAfternoon(): ?ForecastPart
    {
        return $this->afternoon;
    }

    /**
     * @return ForecastVariable|null
     */
    public function getVariable(): ?ForecastVariable
    {
        return $this->variable;
    }
}
