<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Mesurades;

/**
 * Class Mesurades\Metadades
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-duna-variable
 * @package Meteocat\Model\Query\Xema\Mesurades
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Metadades extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_variable}/metadades';

    /**
     * @var int|null
     */
    private $variableCode = null;

    /**
     * Metadades constructor.
     *
     * @param int variableCode Variable code.
     */
    public function __construct(int $variableCode)
    {
        $this->variableCode = $variableCode;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_variable}', $this->variableCode, $uri);

        return $uri;
    }

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
        return parent::getUrl() . $this->generateUri();
    }

    /**
     * @return mixed
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
