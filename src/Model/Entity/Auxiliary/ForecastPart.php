<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class ForecastPart
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ForecastPart extends Entity
{
    /**
     * @var string|null
     */
    private $dayPart = null;

    /**
     * @var array
     */
    private $tendency = [];

    /**
     * @var ForecastSymbol|null
     */
    private $symbol = null;

    /**
     * ForecastPart constructor.
     *
     * @param string   $dayPart
     * @param stdClass $data
     */
    public function __construct(string $dayPart, stdClass $data)
    {
        $this->dayPart = $dayPart;

        $tendencies = $this->getPropertyData($data, 'tendencies');
        if ($tendencies !== null) {
            foreach ($tendencies as $tendency) {
                $this->tendency[] = new ForecastTendency((object)$tendency);
            }
        }

        $symbols = $this->getPropertyData($data, 'simbols');
        if ($symbols !== null) {
            $this->symbol = new ForecastSymbol((object)$symbols);
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
    public function getTendency(): array
    {
        return $this->tendency;
    }

    /**
     * @return ForecastSymbol|null
     */
    public function getSymbol(): ?ForecastSymbol
    {
        return $this->symbol;
    }
}
