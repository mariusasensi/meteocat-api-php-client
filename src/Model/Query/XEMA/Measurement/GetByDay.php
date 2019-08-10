<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Measurement;

use DateTime;
use Meteocat\Model\Entity\Variable;

/**
 * Class Measurement\GetByDay
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#dades-duna-variable-per-a-totes-les-estacions
 * @package Meteocat\Model\Query\XEMA\Measurement
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetByDay extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_variable}/{any}/{mes}/{dia}';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * @var DateTime|null
     */
    private $date = null;

    /**
     * GetByDay constructor.
     *
     * @param int      $variable Variable code.
     * @param DateTime $date     Date to check.
     */
    public function __construct(int $variable, DateTime $date)
    {
        $this->variable = $variable;
        $this->date     = $date;
    }

    /**
     * @param string $station Station code.
     */
    public function withStation(string $station)
    {
        $this->station = $station;
    }

    /**
     * @return string
     */
    private function generateUri(): string
    {
        $uri = str_replace(
            ['{codi_variable}', '{any}', '{mes}', '{dia}'],
            [$this->variable, $this->date->format('Y'), $this->date->format('m'), $this->date->format('d')],
            self::URI
        );

        $query = http_build_query([
            'codiEstacio' => $this->station,
        ]);

        return $uri . (empty($query) ? '' : "?{$query}");
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
        return Variable::class;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
