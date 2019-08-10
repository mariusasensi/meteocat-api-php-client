<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Measurement;

use DateTime;
use Meteocat\Model\Entity\Variable;

/**
 * Class Measurement\GetAllByStation
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-les-variables-duna-estacio
 * @package Meteocat\Model\Query\XEMA\Measurement
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetAllByStation extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/mesurades/metadades';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * @var string|null
     */
    private $state = null;

    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * GetAllByStation constructor.
     *
     * @param string $station Station code.
     */
    public function __construct(string $station)
    {
        $this->station = $station;
    }

    /**
     * @param string $state
     *
     * @return $this
     */
    public function withState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param DateTime $date
     *
     * @return $this
     */
    public function withDate(DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    private function generateUri(): string
    {
        $uri = str_replace('{codi_estacio}', $this->station, self::URI);

        $query = http_build_query([
            'estat' => $this->state,
            'data'  => $this->date === null ? null : $this->date->format(parent::DEFAULT_DATE_FORMAT),
        ]);

        return $uri . (empty($query) ? '' : "?{$query}");
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
