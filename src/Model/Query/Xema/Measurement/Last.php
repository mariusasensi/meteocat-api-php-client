<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Measurement;

/**
 * Class Measurement\Last
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#ultimes-dades-duna-variable-per-a-totes-les-estacions
 * @package Meteocat\Model\Query\Xema\Measurement
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Last extends Base
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
     * Last constructor.
     *
     * @param int $variable Variable code.
     */
    public function __construct(int $variable)
    {
        $this->variable = $variable;
    }

    /**
     * @param string $station Station code.
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
        ]);

        return $uri . (empty($query) ? "" : "?{$query}");
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/Last";
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
