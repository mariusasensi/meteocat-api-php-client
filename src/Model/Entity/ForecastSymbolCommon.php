<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastSymbolCommon
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastSymbolCommon extends Entity
{
    /**
     * @var SymbolValue|null
     */
    private $symbol = null;

    /**
     * @var Coordinate|null
     */
    private $coordinate = null;

    /**
     * ForecastSymbolCommon constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $symbol = $this->getPropertyData($data, 'codi', 0);
        if ($symbol !== null) {
            $symbolObject = new stdClass();
            $symbolObject->codi = (string)$symbol;
            $this->symbol = new SymbolValue((object)$symbolObject);
        }

        $coordinates = $this->getPropertyData($data, 'coordenades');
        if ($coordinates !== null) {
            $this->coordinate = new Coordinate((object)$coordinates);
        }
    }

    /**
     * @return SymbolValue
     */
    public function getSymbol(): ?SymbolValue
    {
        return $this->symbol;
    }

    /**
     * @return Coordinate|null
     */
    public function getCoordinate(): ?Coordinate
    {
        return $this->coordinate;
    }
}
