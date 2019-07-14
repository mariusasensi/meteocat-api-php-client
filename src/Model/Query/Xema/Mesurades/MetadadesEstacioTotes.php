<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Mesurades;

use DateTime;

/**
 * Class Mesurades\MetadadesEstacioTotes
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-les-variables-duna-estacio
 * @package Meteocat\Model\Query\Xema\Estacions
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class MetadadesEstacioTotes extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/mesurades/metadades';

    /**
     * @var string|null
     */
    private $estacioCode = null;

    /**
     * @var string|null
     */
    private $estat = null;

    /**
     * @var DateTime|null
     */
    private $data = null;

    /**
     * MetadadesEstacioTotes constructor.
     *
     * @param string $estacioCode
     */
    public function __construct(string $estacioCode)
    {
        $this->estacioCode = $estacioCode;
    }

    /**
     * @param string $estat
     *
     * @return $this
     */
    public function withEstat(string $estat)
    {
        $this->estat = $estat;

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
        $uri = self::URI;
        $uri = str_replace('{codi_estacio}', $this->estacioCode, $uri);

        $query = http_build_query([
            'estat' => $this->estat,
            'data'  => is_null($this->data) ? null : $this->data->format(parent::DEFAULT_DATE_FORMAT),
        ]);

        return $uri . (empty($query) ? "" : "?{$query}");
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/MetadadesEstacioTotes";
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
