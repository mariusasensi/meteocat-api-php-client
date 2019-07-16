<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Measurement;

/**
 * Class Measurement\GetByStation
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-duna-variable-duna-estacio
 * @package Meteocat\Model\Query\Xema\Measurement
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetByStation extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/mesurades/{codi_variable}/metadades';

    /**
     * @var string|null
     */
    private $stationCode = null;

    /**
     * @var int|null
     */
    private $variableCode = null;

    /**
     * GetByStation constructor.
     *
     * @param string $stationCode  Station code.
     * @param int    $variableCode Variable id.
     */
    public function __construct(string $stationCode, int $variableCode)
    {
        $this->stationCode  = $stationCode;
        $this->variableCode = $variableCode;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_estacio}', $this->stationCode, $uri);
        $uri = str_replace('{codi_variable}', $this->variableCode, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetByStation";
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
