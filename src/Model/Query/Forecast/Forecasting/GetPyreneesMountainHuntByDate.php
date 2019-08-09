<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Forecast\Forecasting;

use Datetime;
use Meteocat\Model\Entity\ForecastMountainHunt;

/**
 * Class GetPyreneesMountainHuntByDate
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-de-pics-del-pirineu
 * @package Meteocat\Model\Query\Forecast\Forecasting
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class GetPyreneesMountainHuntByDate extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/pirineu/refugis/{slug}/{any}/{mes}/{dia}';

    /**
     * @var string|null
     */
    private $hunt = null;

    /**
     * @var Datetime|null
     */
    private $date = null;

    /**
     * GetCatalunyaByDate constructor.
     *
     * @param string   $hunt Peak code.
     * @param Datetime $date Requested date.
     */
    public function __construct(string $hunt, DateTime $date)
    {
        $this->hunt = $hunt;
        $this->date = $date;
    }

    /**
     * @return string
     */
    private function generateUri(): string
    {
        return str_replace(
            ['{slug}', '{any}', '{mes}', '{dia}'],
            [$this->hunt, $this->date->format('Y'), $this->date->format('m'), $this->date->format('d')],
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
     * @return string
     */
    public function getResponseClass(): string
    {
        return ForecastMountainHunt::class;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
