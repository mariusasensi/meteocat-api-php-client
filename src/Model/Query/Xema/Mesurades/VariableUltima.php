<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Mesurades;

/**
 * Class Mesurades\VariableUltima
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#ultimes-dades-duna-variable-per-a-totes-les-estacions
 * @package Meteocat\Model\Query\Xema\Mesurades
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class VariableUltima extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_variable}/ultimes';

    /**
     * @var string|null
     */
    private $estacioCode = null;

    /**
     * @var int|null
     */
    private $variableCode = null;

    /**
     * MetadadesEstacio constructor.
     *
     * @param int $variableCode Variable id.
     */
    public function __construct(int $variableCode)
    {
        $this->variableCode = $variableCode;
    }

    /**
     * @param string $estacioCode Station code.
     */
    public function withEstacio(string $estacioCode)
    {
        $this->estacioCode = $estacioCode;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_variable}', $this->variableCode, $uri);

        $query = http_build_query([
            'codiEstacio' => $this->estacioCode,
        ]);

        return $uri . (empty($query) ? "" : "?{$query}");
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/VariableUltima";
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
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
