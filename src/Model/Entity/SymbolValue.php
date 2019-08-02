<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class SymbolValue
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class SymbolValue
{
    /**
     * @var string|null
     */
    private $code = null;

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var string|null
     */
    private $description = null;

    /**
     * @var string|null
     */
    private $category = null;

    /**
     * @var string|null
     */
    private $urlIcon = null;

    /**
     * @var string|null
     */
    private $urlIconNight = null;

    /**
     * SymbolValue constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code         = (string)$data->codi;
        $this->name         = (string)$data->nom;
        $this->description  = (string)$data->descripcio;
        $this->category     = isset($data->categoria) ? (string)$data->categoria : null;
        $this->urlIcon      = (string)$data->icona;
        $this->urlIconNight = (string)$data->icona_nit;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @return string|null
     */
    public function getUrlIcon(): ?string
    {
        return $this->urlIcon;
    }

    /**
     * @return string|null
     */
    public function getUrlIconNight(): ?string
    {
        return $this->urlIconNight;
    }
}
