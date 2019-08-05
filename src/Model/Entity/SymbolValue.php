<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class SymbolValue
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class SymbolValue extends Entity
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
        $this->code         = $this->getPropertyData($data, 'codi');
        $this->name         = $this->getPropertyData($data, 'nom');
        $this->description  = $this->getPropertyData($data, 'descripcio');
        $this->category     = $this->getPropertyData($data, 'categoria');
        $this->urlIcon      = $this->getPropertyData($data, 'icona');
        $this->urlIconNight = $this->getPropertyData($data, 'icona_nit');
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
