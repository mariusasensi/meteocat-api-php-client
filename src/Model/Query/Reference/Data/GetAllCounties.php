<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Reference\Data;

use Meteocat\Model\Entity\County;

/**
 * Class Data\GetAllCounties
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/referencia/#dades-de-referencia-de-les-comarques
 * @package Meteocat\Model\Query\Reference\Data
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetAllCounties extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/comarques';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/GetAllCounties';
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
        return County::class;
    }
}
