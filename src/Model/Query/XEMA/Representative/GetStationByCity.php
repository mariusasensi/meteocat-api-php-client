<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Representative;

use Meteocat\Model\Entity\City;

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
    private function generateUri(): string
    {
        return str_replace(['{codi_municipi}', '{codi_variable}'], [$this->city, $this->variable], self::URI);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return parent::getUrl() . $this->generateUri();
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
        return City::class;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
