<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastTendency
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-de-prediccio/
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastTendency extends Entity
{
    /**
     * @var string|null
     */
    private $type = null;

    /**
     * @var int
     */
    private $value = 0;

    /**
     * ForecastTendency constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->type  = $this->getPropertyData($data, 'tipus');
        $this->value = $this->getPropertyData($data, 'valor', 0);
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
