<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Statistic;

/**
 * Class Statistic\GetYearlyMetadataByFilters
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-duna-estacio
 * @package Meteocat\Model\Query\XEMA\Statistic
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetYearlyMetadataByFilters extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/estadistics/anuals/{codi_variable}/metadades';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * GetYearlyMetadataByStation constructor.
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
    private function generateUri(): string
    {
        return str_replace(['{codi_estacio}', '{codi_variable}'], [$this->station, $this->variable], self::URI);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return sprintf('%s://%s/%s/v%s%s', parent::DEFAULT_PROTOCOL, parent::BASE_URL, parent::NAME, parent::VERSION, $this->generateUri());
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
