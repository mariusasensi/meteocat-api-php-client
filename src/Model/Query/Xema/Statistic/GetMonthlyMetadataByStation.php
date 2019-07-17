<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Statistic;

/**
 * Class Statistic\GetMonthlyMetadataByStation
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-duna-estacio
 * @package Meteocat\Model\Query\Xema\Statistic
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetMonthlyMetadataByStation extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/estadistics/mensuals/metadades';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * GetMonthlyMetadataByStation constructor.
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
    public function getName() : string
    {
        return parent::getName() . "/GetMonthlyMetadataByStation";
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return sprintf('%s/%s/v%s%s',parent::BASE_URL, parent::NAME, parent::VERSION, $this->generateUri());
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
