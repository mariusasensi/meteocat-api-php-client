<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class Plan
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Plan
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
     * @var int|null
     */
    private $requestsMax = null;

    /**
     * @var int|null
     */
    private $requestsRemaining = null;

    /**
     * @var int|null
     */
    private $requestsRealised = null;

    /**
     * Plan constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->name              = (string)$data->nom;
        $this->period            = (string)$data->periode;
        $this->requestsMax       = (int)$data->maxConsultes;
        $this->requestsRemaining = (int)$data->consultesRestants;
        $this->requestsRealised  = (int)$data->consultesRealitzades;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @return null
     */
    public function getRequestsMax()
    {
        return $this->requestsMax;
    }

    /**
     * @return null
     */
    public function getRequestsRemaining()
    {
        return $this->requestsRemaining;
    }

    /**
     * @return null
     */
    public function getRequestsRealised()
    {
        return $this->requestsRealised;
    }
}
