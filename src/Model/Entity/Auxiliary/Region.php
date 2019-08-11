<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class City
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Region extends Entity
{
    /**
     * @var int
     */
    private $code = 0;

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * Region constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code = $this->getPropertyData($data, 'codi', 0);
        $this->name = $this->getPropertyData($data, 'nom');
    }

    /**
     * @return int
     */
    public function getCode(): int
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
