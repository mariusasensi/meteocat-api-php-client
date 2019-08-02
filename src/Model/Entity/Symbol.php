<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class Symbol
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class Symbol extends Response
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var string|null
     */
    private $description = null;

    /**
     * @var null
     */
    private $values = null;

    /**
     * Symbol constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->name        = (string)$data->nom;
        $this->description = (string)$data->descripcio;

        foreach ($data->valors as $symbol) {
            $this->values[] = new SymbolValue($symbol);
        }
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
     * @return array|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }
}
