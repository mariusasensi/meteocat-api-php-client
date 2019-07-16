<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Representative;

/**
 * Class Representative\VariableMetadata
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/#metadades-de-variables
 * @package Meteocat\Model\Query\Xema\Representative
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class All extends Base
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
        return parent::getName() . '/All';
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
