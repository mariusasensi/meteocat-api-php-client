<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use Meteocat\Model\Entity\Auxiliary\Client;
use Meteocat\Model\Entity\Auxiliary\Plan;
use stdClass;

/**
 * Class Quota
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Quota extends Entity implements Response
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
        $client = $this->getPropertyData($data, 'client');
        if ($client !== null) {
            $this->client = new Client((object)$client);
        }

        $plans = $this->getPropertyData($data, 'plans');
        if (is_array($plans)) {
            foreach ($plans as $plan) {
                $this->plans[] = new Plan((object)$plan);
            }
        }
    }

    /**
     * @return Client|null
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @return array
     */
    public function getPlans(): array
    {
        return $this->plans;
    }
}
