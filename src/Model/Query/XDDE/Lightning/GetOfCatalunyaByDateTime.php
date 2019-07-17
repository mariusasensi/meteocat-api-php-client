<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XDDE\Lightning;

use DateTime;

/**
 * Class GetOfCatalunyaByDateTime
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/xarxa-de-deteccio-de-descarregues-electriques/#dades-de-descarregues-a-catalunya
 * @package Meteocat\Model\Query\XDDE\Lightning
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetOfCatalunyaByDateTime extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/catalunya/{any}/{mes}/{dia}/{hora}';

    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * GetOfCatalunyaByDateTime constructor.
     *
     * @param DateTime $date Requested date.
     */
    public function __construct(DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{any}', $this->date->format('Y'), $uri);
        $uri = str_replace('{mes}', $this->date->format('m'), $uri);
        $uri = str_replace('{dia}', $this->date->format('d'), $uri);
        $uri = str_replace('{hora}', $this->date->format('H'), $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetOfCatalunyaByDateTime";
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . $this->generateUri();
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
