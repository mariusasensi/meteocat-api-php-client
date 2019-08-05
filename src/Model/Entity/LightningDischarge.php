<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class LightningDischarge
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class LightningDischarge extends Entity
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
        $this->type  = $this->getPropertyData($data, 'tipus');
        $this->count = $this->getPropertyData($data, 'recompte', 0);
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
