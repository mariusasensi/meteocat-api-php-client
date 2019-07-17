<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Statistic;

use DateTime;

/**
 * Class Statistic\GetDailyByVariable
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#estadistics-diaris-duna-variable-per-a-totes-les-estacions
 * @package Meteocat\Model\Query\XEMA\Statistic
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetDailyByVariable extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/diaris/{codi_variable}';

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * GetDailyByVariable constructor.
     *
     * @param int      $variable  Variable code.
     * @param DateTime $yearMonth Requested year and month.
     */
    public function __construct(int $variable, DateTime $yearMonth)
    {
        $this->variable = $variable;
        $this->date     = $yearMonth;
    }

    /**
     * @param string $station
     */
    public function withStation(string $station)
    {
        $this->station = $station;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_variable}', $this->variable, $uri);

        $query = http_build_query([
            'codiEstacio' => $this->station,
            'any'         => $this->date->format('Y'),
            'mes'         => $this->date->format('m'),
        ]);

        return $uri . (empty($query) ? "" : "?{$query}");
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetDailyByVariable";
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
