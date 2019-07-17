<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Auxiliary;

/**
 * Class Auxiliary\All
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-de-totes-les-variables
 * @package Meteocat\Model\Query\Xema\Auxiliary
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class All extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/metadades';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/All";
    }

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
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
