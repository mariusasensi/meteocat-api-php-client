<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Datetime;
use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class Notice
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Notice extends Entity
{
    /**
     * @var int|null
     */
    private $level = null;

    /**
     * @var string|null
     */
    private $type = null;

    /**
     * @var Datetime|null
     */
    private $dateStart = null;

    /**
     * @var Datetime|null
     */
    private $dateEnd = null;

    /**
     * @var Datetime|null
     */
    private $dateEmission = null;

    /**
     * @var string|null
     */
    private $status = null;

    /**
     * @var string|null
     */
    private $threshold = null;

    /**
     * @var int|null
     */
    private $warning = null;

    /**
     * @var string|null
     */
    private $comment = null;

    /**
     * @var array
     */
    private $evolutions = [];

    /**
     * Status constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->level = $this->getPropertyData($data, 'nivell');
        $this->type = $this->getPropertyData($data, 'tipus');
        $this->status = $this->getPropertyData($data, 'estat');
        $this->threshold = $this->getPropertyData($data, 'llindar');
        $this->warning = $this->getPropertyData($data, 'perill');
        $this->comment = $this->getPropertyData($data, 'comentari');
        $this->dateStart = $this->getPropertyDataAsDate($data, 'dataInici');
        $this->dateEnd = $this->getPropertyDataAsDate($data, 'dataFi');
        $this->dateEmission = $this->getPropertyDataAsDate($data, 'dataEmisio');

        $evolutions = $this->getPropertyData($data, 'evolucions');
        if (is_array($evolutions)) {
            foreach ($evolutions as $evolution) {
                $this->evolutions[] = new Evolution((object)$evolution);
            }
        }
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return Datetime|null
     */
    public function getDateStart(): ?Datetime
    {
        return $this->dateStart;
    }

    /**
     * @return Datetime|null
     */
    public function getDateEnd(): ?Datetime
    {
        return $this->dateEnd;
    }

    /**
     * @return Datetime|null
     */
    public function getDateEmission(): ?Datetime
    {
        return $this->dateEmission;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getThreshold(): ?string
    {
        return $this->threshold;
    }

    /**
     * @return int|null
     */
    public function getWarning(): ?int
    {
        return $this->warning;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return array
     */
    public function getEvolutions(): array
    {
        return $this->evolutions;
    }
}
