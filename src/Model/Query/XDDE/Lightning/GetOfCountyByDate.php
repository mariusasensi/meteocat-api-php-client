<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XDDE\Lightning;

use DateTime;

/**
 * Class GetOfCountyByDate
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/xarxa-de-deteccio-de-descarregues-electriques/#resum-de-descarregues-per-comarca
 * @package Meteocat\Model\Query\XDDE\Lightning
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetOfCountyByDate extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/informes/comarques/{codi_comarca}/{any}/{mes}/{dia}';

    /**
     * @var int|null
     */
    private $county = null;

    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * GetOfCatalunyaByDateTime constructor.
     *
     * @param int      $county County code (In catalan, "comarca")
     * @param DateTime $date   Requested date.
     */
    public function __construct(int $county, DateTime $date)
    {
        $this->county = $county;
        $this->date   = $date;
    }

    /**
     * @return string
     */
    private function generateUri(): string
    {
        return str_replace(
            ['{codi_comarca}', '{any}', '{mes}', '{dia}'],
            [$this->county, $this->date->format('Y'), $this->date->format('m'), $this->date->format('d')],
            self::URI
        );
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return parent::getUrl() . $this->generateUri();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->clear($this->getUrl());
    }

    /**
     * TODO: Entity response class.
     *
     * @return string
     */
    public function getResponseClass(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
