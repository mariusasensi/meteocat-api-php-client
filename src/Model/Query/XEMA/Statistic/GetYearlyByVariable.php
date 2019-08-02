<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Statistic;

/**
 * Class Statistic\GetYearlyByVariable
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#estadistics-anuals-duna-variable-per-a-totes-les-estacions
 * @package Meteocat\Model\Query\XEMA\Statistic
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetYearlyByVariable extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/anuals/{codi_variable}';

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * GetYearlyByVariable constructor.
     *
     * @param int $variable Variable code.
     */
    public function __construct(int $variable)
    {
        $this->variable = $variable;
    }

    /**
     * @param string $station
     *
     * @return GetYearlyByVariable
     */
    public function withStation(string $station): self
    {
        $this->station = $station;

        return $this;
    }

    /**
     * @return string
     */
    private function generateUri(): string
    {
        $uri = str_replace('{codi_variable}', $this->variable, self::URI);

        $query = http_build_query([
            'codiEstacio' => $this->station,
        ]);

        return $uri . (empty($query) ? '' : "?{$query}");
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
