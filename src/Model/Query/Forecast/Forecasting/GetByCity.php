<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

/**
 * Class GetByCity
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-municipal
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetByCity extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/municipal/{codi}';

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
        return str_replace('{codi}', $this->city, self::URI);
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
     * TODO: Entity response class.
     *
     * @return string
     */
    public function getResponseClass(): string
    {
        return '';
    }

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
