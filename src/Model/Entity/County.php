<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class County
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class County extends Response
{
    /**
     * @var int|null
     */
    private $code = null;

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * County constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code = (int)$data->codi;
        $this->name = (string)$data->nom;
    }

    /**
     * @return int|null
     */
    public function getCode(): ?int
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
}
