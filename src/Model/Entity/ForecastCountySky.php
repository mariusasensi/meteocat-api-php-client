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
final class ForecastCountySky extends Entity
{
    /**
     * @var County|null
     */
    private $county = null;

    /**
     * @var SymbolValue|null
     */
    private $symbol = null;

    /**
     * ForecastCountySky constructor.
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

        $symbolId = $this->getPropertyData($data, 'simbol');
        if ($symbolId !== null) {
            $symbol = new stdClass();
            $symbol->codi = (string)$symbolId;
            $this->symbol = new SymbolValue((object)$symbol);
        }
    }

    /**
     * @return County|null
     */
    public function getCounty(): ?County
    {
        return $this->county;
    }

    /**
     * @return SymbolValue|null
     */
    public function getSymbol(): ?SymbolValue
    {
        return $this->symbol;
    }
}
