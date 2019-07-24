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
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi}', $this->city, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/GetByCity';
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . $this->generateUri();
    }

    /**
     * @return mixed
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
