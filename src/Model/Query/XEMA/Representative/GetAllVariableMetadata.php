<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Representative;

use Meteocat\Model\Entity\Variable;

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
     * @return string
     */
    public function getResponseClass(): string
    {
        return Variable::class;
    }

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
