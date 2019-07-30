<?php

declare(strict_types=1);

namespace Meteocat\Model\Factory;

use Meteocat\Model\Entity\Response;
use Meteocat\Model\Exception\EntityNotFound;

/**
 * Class Builder
 *
 * @package Meteocat\Model\Factory
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class Builder
{
    /**
     * Convert from JSON response to the desired entity.
     *
     * @param string $entity
     * @param string $raw
     *
     * @return Response
     * @throws EntityNotFound
     */
    public static function create(string $entity, string $raw)
    {
        $response = (object)json_decode($raw);

        if (!class_exists($entity)) {
            throw new EntityNotFound();
        }

        return new $entity($response);
    }
}
