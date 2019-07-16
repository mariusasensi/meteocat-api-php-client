<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Station;

use DateTime;

/**
 * Class Station\All
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/#metadades-de-totes-les-estacions
 * @package Meteocat\Model\Query\Xema\Station
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class All extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/metadades';

    /**
     * @var string|null
     */
    private $state = null;

    /**
     * @var DateTime|null
     */
    private $data = null;

    /**
     * @param string $state
     *
     * @return $this
     */
    public function withState(string $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param DateTime $data
     *
     * @return $this
     */
    public function withData(DateTime $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $query = http_build_query([
            'estat' => $this->state,
            'data'  => is_null($this->data) ? null : $this->data->format(parent::DEFAULT_DATE_FORMAT),
        ]);

        return self::URI . (empty($query) ? "" : "?{$query}");
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/All";
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
