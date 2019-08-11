<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Datetime;
use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class Alert
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Status extends Entity
{
    public const OPEN      = 'Obert';
    public const FINALIZED = 'Finalitzat';
    public const CANCELED  = 'Cancel·lat';

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var Datetime|null
     */
    private $date = null;

    /**
     * Status constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->date = $this->getPropertyDataAsDate($data, 'data');

        $name = $this->getPropertyData($data, 'nom');
        if (in_array($name, $this->getAllStatus(), true)) {
            $this->name = $name;
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
     * @return Datetime|null
     */
    public function getDate(): ?Datetime
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function getAllStatus()
    {
        return [
            self::OPEN,
            self::FINALIZED,
            self::CANCELED,
        ];
    }
}
