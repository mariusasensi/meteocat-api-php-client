<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Reference\Data;

use Meteocat\Model\Entity\Symbol;

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
    public function getUrl(): string
    {
        return parent::getUrl() . self::URI;
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
        return Symbol::class;
    }

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
