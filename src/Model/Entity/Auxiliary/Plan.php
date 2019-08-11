<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class Plan
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Plan extends Entity
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var string|null
     */
    private $period = null;

    /**
     * @var int
     */
    private $requestsMax = 0;

    /**
     * @var int
     */
    private $requestsRemaining = 0;

    /**
     * @var int
     */
    private $requestsRealised = 0;

    /**
     * Plan constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->name              = (string)$this->getPropertyData($data, 'nom');
        $this->period            = (string)$this->getPropertyData($data, 'periode');
        $this->requestsMax       = (int)$this->getPropertyData($data, 'maxConsultes', 0);
        $this->requestsRemaining = (int)$this->getPropertyData($data, 'consultesRestants', 0);
        $this->requestsRealised  = (int)$this->getPropertyData($data, 'consultesRealitzades', 0);
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
    public function getPeriod(): ?string
    {
        return $this->period;
    }

    /**
     * @return int
     */
    public function getRequestsMax(): int
    {
        return $this->requestsMax;
    }

    /**
     * @return int
     */
    public function getRequestsRemaining(): int
    {
        return $this->requestsRemaining;
    }

    /**
     * @return int
     */
    public function getRequestsRealised(): int
    {
        return $this->requestsRealised;
    }
}
