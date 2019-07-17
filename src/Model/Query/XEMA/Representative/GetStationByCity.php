<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Representative;

/**
 * Class GetStationByCity
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/#estacions-representatives-per-a-un-municipi-i-una-variable
 * @package Meteocat\Model\Query\XEMA\Representative
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetStationByCity extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/municipis/{codi_municipi}/variables/{codi_variable}';

    /**
     * @var string|null
     */
    private $city = null;

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * Station constructor.
     *
     * @param string $city     City id.
     * @param int    $variable Variable id.
     */
    public function __construct(string $city, int $variable)
    {
        $this->city     = $city;
        $this->variable = $variable;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_municipi}', $this->city, $uri);
        $uri = str_replace('{codi_variable}', $this->variable, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetStationByCity";
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
