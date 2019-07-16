<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Station;

/**
 * Class Station\Get
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/#metadades-de-variables
 * @package Meteocat\Model\Query\Xema\Station
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Get extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_estacio}/metadades';

    /**
     * @var string|null
     */
    private $stationCode = null;

    /**
     * Unique constructor.
     *
     * @param string $stationCode Station code.
     */
    public function __construct(string $stationCode)
    {
        $this->stationCode = $stationCode;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_estacio}', $this->stationCode, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/Get';
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
