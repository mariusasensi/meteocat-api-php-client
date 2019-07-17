<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Auxiliary;

/**
 * Class Auxiliary\GetByVariable
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-duna-variable
 * @package Meteocat\Model\Query\XEMA\Auxiliary
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetByVariable extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/{codi_variable}/metadades';

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * GetByVariable constructor.
     *
     * @param int $variable Variable code.
     */
    public function __construct(int $variable)
    {
        $this->variable = $variable;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_variable}', $this->variable, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetByVariable";
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
