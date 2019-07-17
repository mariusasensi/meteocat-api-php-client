<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Statistic;

/**
 * Class Statistic\GetDailyMetadataByFilters
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-duna-estacio
 * @package Meteocat\Model\Query\Xema\Statistic
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetDailyMetadataByFilters extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/estadistics/diaris/{codi_variable}/metadades';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * GetDailyMetadataByFilters constructor.
     *
     * @param string $station  Station code.
     * @param int    $variable Variable code.
     */
    public function __construct(string $station, int $variable)
    {
        $this->station  = $station;
        $this->variable = $variable;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_estacio}', $this->station, $uri);
        $uri = str_replace('{codi_variable}', $this->variable, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetDailyMetadataByFilters";
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return sprintf('%s/%s/v%s%s', parent::BASE_URL, parent::NAME, parent::VERSION, $this->generateUri());
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
