<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Measurement;

use DateTime;

/**
 * Class Measurement\AllByStation
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-les-variables-duna-estacio
 * @package Meteocat\Model\Query\Xema\Measurement
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class AllByStation extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/mesurades/metadades';

    /**
     * @var string|null
     */
    private $stationCode = null;

    /**
     * @var string|null
     */
    private $status = null;

    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * AllByStation constructor.
     *
     * @param string $stationCode
     */
    public function __construct(string $stationCode)
    {
        $this->stationCode = $stationCode;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function withStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param DateTime $date
     *
     * @return $this
     */
    public function withDate(DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_estacio}', $this->stationCode, $uri);

        $query = http_build_query([
            'estat' => $this->status,
            'data'  => is_null($this->date) ? null : $this->date->format(parent::DEFAULT_DATE_FORMAT),
        ]);

        return $uri . (empty($query) ? "" : "?{$query}");
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/AllByStation";
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
