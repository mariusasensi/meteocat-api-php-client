<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Auxiliary;

/**
 * Class Auxiliary\GetMetadataByFilters
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-duna-variable-duna-estacio
 * @package Meteocat\Model\Query\Xema\Auxiliary
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetMetadataByFilters extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/auxiliars/{codi_variable}/metadades';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * GetMetadataByFilters constructor.
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
        return parent::getName() . "/GetMetadataByFilters";
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
