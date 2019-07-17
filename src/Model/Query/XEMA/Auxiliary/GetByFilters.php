<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Auxiliary;

use Datetime;

/**
 * Class Auxiliary\GetByFilters
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#calcul-auxiliars-duna-variable-a-una-estacio
 * @package Meteocat\Model\Query\XEMA\Auxiliary
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetByFilters extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_variable}/{any}/{mes}/{dia}';

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * @var Datetime|null
     */
    private $date = null;

    /**
     * GetByFilters constructor.
     *
     * @param int      $variable
     * @param string   $station
     * @param Datetime $date
     */
    public function __construct(int $variable, string $station, DateTime $date)
    {
        $this->variable = $variable;
        $this->station  = $station;
        $this->date     = $date;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_variable}', $this->variable, $uri);
        $uri = str_replace('{any}', $this->date->format('Y'), $uri);
        $uri = str_replace('{mes}', $this->date->format('m'), $uri);
        $uri = str_replace('{dia}', $this->date->format('d'), $uri);

        $query = http_build_query([
            'codiEstacio' => $this->station,
        ]);

        return sprintf('%s?%s', $uri, $query);
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetByFilters";
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
