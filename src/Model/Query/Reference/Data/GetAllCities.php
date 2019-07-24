<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Reference\Data;

/**
 * Class Data\GetAllCities
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/referencia/#dades-de-referencia-dels-municipis
 * @package Meteocat\Model\Query\Reference\Data
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetAllCities extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/municipis';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/GetAllCities';
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . self::URI;
    }

    /**
     * @return mixed
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
