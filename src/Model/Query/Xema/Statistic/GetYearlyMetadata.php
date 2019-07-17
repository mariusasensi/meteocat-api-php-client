<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Statistic;

/**
 * Class Statistic\GetYearlyMetadata
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals
 * @package Meteocat\Model\Query\Xema\Statistic
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetYearlyMetadata extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/anuals/metadades';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetYearlyMetadata";
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
