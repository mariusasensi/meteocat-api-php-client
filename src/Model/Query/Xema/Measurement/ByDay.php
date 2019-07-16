<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Measurement;

use DateTime;

/**
 * Class Measurement\ByDay
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#dades-duna-variable-per-a-totes-les-estacions
 * @package Meteocat\Model\Query\Xema\Measurement
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class ByDay extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_variable}/{any}/{mes}/{dia}';

    /**
     * @var string|null
     */
    private $stationCode = null;

    /**
     * @var int|null
     */
    private $variableCode = null;

    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * ByDay constructor.
     *
     * @param int      $variableCode Variable id.
     * @param DateTime $date         Day to check.
     */
    public function __construct(int $variableCode, DateTime $date)
    {
        $this->variableCode = $variableCode;
        $this->date         = $date;
    }

    /**
     * @param string $stationCode Station code.
     */
    public function withStation(string $stationCode)
    {
        $this->stationCode = $stationCode;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_variable}', $this->variableCode, $uri);
        $uri = str_replace('{any}', $this->date->format('Y'), $uri);
        $uri = str_replace('{mes}', $this->date->format('m'), $uri);
        $uri = str_replace('{dia}', $this->date->format('d'), $uri);

        $query = http_build_query([
            'codiEstacio' => $this->stationCode,
        ]);

        return $uri . (empty($query) ? "" : "?{$query}");
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/ByDay";
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
