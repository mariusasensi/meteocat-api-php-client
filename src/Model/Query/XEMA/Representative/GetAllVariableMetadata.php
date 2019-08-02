<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Representative;

/**
 * Class Representative\GetAllVariableMetadata
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/#metadades-de-variables
 * @package Meteocat\Model\Query\XEMA\Representative
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetAllVariableMetadata extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/variables';

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
     * TODO: Entity response class.
     *
     * @return string
     */
    public function getResponseClass(): string
    {
        return '';
    }

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
