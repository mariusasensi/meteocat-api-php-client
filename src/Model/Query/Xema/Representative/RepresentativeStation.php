<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Representative;

/**
 * Class RepresentativeStation
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/#estacions-representatives-per-a-un-municipi-i-una-variable
 * @package Meteocat\Model\Query\Xema\Representative
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class RepresentativeStation extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/municipis/{codi_municipi}/variables/{codi_variable}';

    /**
     * @var string|null
     */
    private $cityCode = null;

    /**
     * @var int|null
     */
    private $variableCode = null;

    /**
     * RepresentativeStation constructor.
     *
     * @param string $cityCode     City id.
     * @param int    $variableCode Variable id.
     */
    public function __construct(string $cityCode, int $variableCode)
    {
        $this->cityCode     = $cityCode;
        $this->variableCode = $variableCode;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_municipi}', $this->cityCode, $uri);
        $uri = str_replace('{codi_variable}', $this->variableCode, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/RepresentativeStation";
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
