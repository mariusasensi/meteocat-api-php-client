<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Estacions;

/**
 * Class Estacions\Metadades
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
    private const URI = '/{codi_estacio}/metadades';

    /**
     * @var string|null
     */
    private $estacioCode = null;

    /**
     * Metadades constructor.
     *
     * @param string $estacioCode Station code.
     */
    public function __construct(string $estacioCode)
    {
        $this->estacioCode = $estacioCode;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_estacio}', $this->estacioCode, $uri);

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
