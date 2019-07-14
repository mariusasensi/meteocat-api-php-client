<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Estacions;

use DateTime;

/**
 * Class Estacions
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/#metadades-de-totes-les-estacions
 * @package Meteocat\Model\Query\Xema\Representatives
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class MetadadesTotes extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/metadades';

    /**
     * @var string|null
     */
    private $estat = null;

    /**
     * @var DateTime|null
     */
    private $data = null;

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
        $query = http_build_query([
            'estat' => $this->estat,
            'data'  => is_null($this->data) ? null : $this->data->format(parent::DEFAULT_DATE_FORMAT),
        ]);

        return self::URI . (empty($query) ? "" : "?{$query}");
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/MetadadesTotes";
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
