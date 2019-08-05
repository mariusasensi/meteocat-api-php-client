<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

use Meteocat\Model\Entity\UltravioletIndex;

/**
 * Class GetUltravioletIndexByCity
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-index-ultraviolat-uvi
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetUltravioletIndexByCity extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/uvi/{codi_municipi}';

    /**
     * @var string|null
     */
    private $city = null;

    /**
     * GetByCity constructor.
     *
     * @param string $city City code.
     */
    public function __construct(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    private function generateUri(): string
    {
        return str_replace('{codi_municipi}', $this->city, self::URI);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return parent::getUrl() . $this->generateUri();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->clear($this->getUrl());
    }

    /**
     * @return string
     */
    public function getResponseClass(): string
    {
        return UltravioletIndex::class;
    }

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
