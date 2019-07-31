<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\MultivariableCalculation;

/**
 * Class MultivariableCalculation\GetMetadataByFilters
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-duna-variable-duna-estacio
 * @package Meteocat\Model\Query\XEMA\MultivariableCalculation
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetMetadataByFilters extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/cmv/{codi_variable}/metadades';

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
        return $this->clear($this->getUrl());
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return sprintf('%s://%s/%s/v%s%s', parent::DEFAULT_PROTOCOL, parent::BASE_URL, parent::NAME, parent::VERSION, $this->generateUri());
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
     * @return string
     */
    public function __toString() : string
    {
        return $this->getName();
    }
}
