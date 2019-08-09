<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class Variable
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Variable extends Entity
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var int
     */
    private $value = 0;

    /**
     * Variable constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->name = $this->getPropertyData($data, 'nom');
        $this->value = $this->getPropertyData($data, 'valor', 0);
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
