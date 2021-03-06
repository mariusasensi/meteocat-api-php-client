<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Auxiliary;

use Meteocat\Model\Entity\Variable;

/**
 * Class Auxiliary\GetAll
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-de-totes-les-variables
 * @package Meteocat\Model\Query\XEMA\Auxiliary
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetAll extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/metadades';

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
        return Variable::class;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
