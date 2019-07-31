<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Measurement;

/**
 * Class Measurement\GetAll
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-totes-les-variables
 * @package Meteocat\Model\Query\XEMA\Measurement
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
    public function getUrl() : string
    {
        return parent::getUrl() . self::URI;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->clear($this->getUrl());
    }

    /**
     * TODO: Entity response class.
     * @return string
     */
    public function getResponseClass() : string
    {
        return "";
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getName();
    }
}
