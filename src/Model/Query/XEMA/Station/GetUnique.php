<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Station;

/**
 * Class Station\GetUnique
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/#metadades-de-variables
 * @package Meteocat\Model\Query\XEMA\Station
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetUnique extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_estacio}/metadades';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * Unique constructor.
     *
     * @param string $station Station code.
     */
    public function __construct(string $station)
    {
        $this->station = $station;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_estacio}', $this->station, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . $this->generateUri();
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->clear($this->getUrl());
    }

    /**
     * TODO: Entity response class.
     * @return string
     */
    public function getResponseClass() : string
    {
        return "";
    }

    /**
     * @return mixed
     */
    public function __toString() : string
    {
        return $this->getName();
    }
}
