<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Quota\Information;

use Meteocat\Model\Entity\Quota;

/**
 * Class Information\GetCurrentUsage
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/quotes/#consum-actual
 * @package Meteocat\Model\Query\Quota\Information
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetCurrentUsage extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/consum-actual';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/GetCurrentUsage';
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

    /**
     * @return string
     */
    public function getResponseClass() : string
    {
        return Quota::class;
    }
}
