<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\Representatives;

/**
 * Class Estacions
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/representatives/#estacions-representatives-per-a-un-municipi-i-una-variable
 * @package Meteocat\Model\Query\Xema\Representatives
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Estacions extends Representatives
{
    /**
     * Endpoint.
     */
    private const URI = '/municipis/{codi_municipi}/variables/{codi_variable}';

    /**
     * @var string|null
     */
    private $municipiCode = null;

    /**
     * @var int|null
     */
    private $variableCode = null;

    /**
     * Estacions constructor.
     *
     * @param string $municipiCode City id.
     * @param int    $variableCode Variable id.
     */
    public function __construct(string $municipiCode, int $variableCode)
    {
        $this->municipiCode = $municipiCode;
        $this->variableCode = $variableCode;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_municipi}', $this->municipiCode, $uri);
        $uri = str_replace('{codi_variable}', $this->variableCode, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return parent::getType() . "/Estacions";
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
