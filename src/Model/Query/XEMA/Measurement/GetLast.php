<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Measurement;

use Meteocat\Model\Entity\Variable;

/**
 * Class Measurement\GetLast
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#ultimes-dades-duna-variable-per-a-totes-les-estacions
 * @package Meteocat\Model\Query\XEMA\Measurement
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetLast extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_variable}/ultimes';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * GetLast constructor.
     *
     * @param int $variable Variable code.
     */
    public function __construct(int $variable)
    {
        $this->variable = $variable;
    }

    /**
     * @param string $station Station code.
     *
     * @return self
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
     * @return string
     */
    public function getResponseClass(): string
    {
        return Variable::class;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
