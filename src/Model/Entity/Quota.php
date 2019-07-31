<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use stdClass;

/**
 * Class Quota
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Quota extends Response
{
    /**
     * @var Client|null
     */
    private $client = null;

    /**
     * @var array
     */
    private $plans = [];

    /**
     * Quota constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->client = new Client($data->client);

        foreach ($data->plans as $plan) {
            $this->plans[] = new Plan($plan);
        }
    }

    /**
     * @return Client|null
     */
    public function getClient() : Client
    {
        return $this->client;
    }

    /**
     * @return array
     */
    public function getPlans() : array
    {
        return $this->plans;
    }
}
