<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Mesurades;

/**
 * Class Mesurades\MetadadesAll
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-totes-les-variables
 * @package Meteocat\Model\Query\Xema\Estacions
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class MetadadesTotes extends Base
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
        return parent::getName() . "/MetadadesTotes";
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
