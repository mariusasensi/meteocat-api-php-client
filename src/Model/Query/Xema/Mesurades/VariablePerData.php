<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Mesurades;

use DateTime;

/**
 * Class Mesurades\VariablePerData
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#dades-duna-variable-per-a-totes-les-estacions
 * @package Meteocat\Model\Query\Xema\Mesurades
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class VariablePerData extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_variable}/{any}/{mes}/{dia}';

    /**
     * @var string|null
     */
    private $estacioCode = null;

    /**
     * @var int|null
     */
    private $variableCode = null;

    /**
     * @var DateTime|null
     */
    private $data = null;

    /**
     * VariablePerData constructor.
     *
     * @param int       $variableCode Variable id.
     * @param DateTime $date Day to check.
     */
    public function __construct(int $variableCode, DateTime $date)
    {
        $this->variableCode = $variableCode;
        $this->data = $date;
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
        $uri = str_replace('{any}', $this->data->format('Y'), $uri);
        $uri = str_replace('{mes}', $this->data->format('m'), $uri);
        $uri = str_replace('{dia}', $this->data->format('d'), $uri);

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
        return parent::getName() . "/VariablePerData";
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
