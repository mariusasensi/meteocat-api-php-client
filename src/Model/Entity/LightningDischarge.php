<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class LightningDischarge
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class LightningDischarge
{
    /**
     * @var string|null
     */
    private $type = null;

    /**
     * @var int
     */
    private $count = 0;

    /**
     * LightningDischarge constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->type  = (string)$data->tipus;
        $this->count = (int)$data->recompte;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}
