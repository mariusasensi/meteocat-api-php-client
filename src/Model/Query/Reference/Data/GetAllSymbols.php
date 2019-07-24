<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Reference\Data;

/**
 * Class Data\GetAllSymbols
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/referencia/#dades-de-referencia-dels-simbols-meteorologics
 * @package Meteocat\Model\Query\Reference\Data
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetAllSymbols extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/simbols';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/GetAllSymbols';
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
