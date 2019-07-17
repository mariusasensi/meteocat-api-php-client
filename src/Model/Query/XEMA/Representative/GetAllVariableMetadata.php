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
    public function getName() : string
    {
        return parent::getName() . '/GetAllVariableMetadata';
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
