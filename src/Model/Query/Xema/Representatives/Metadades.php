<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Representatives;

/**
 * Class Representatives\Metadades
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/#metadades-de-variables
 * @package Meteocat\Model\Query\Xema\Representatives
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Metadades extends Base
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
        return parent::getName() . '/Metadades';
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