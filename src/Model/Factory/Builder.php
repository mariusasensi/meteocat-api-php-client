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
     * @return Response|array
     * @throws EntityNotFound
     */
    public static function create(string $entity, string $raw)
    {
        if (!class_exists($entity)) {
            throw new EntityNotFound();
        }

        // Parse.
        $response = json_decode(html_entity_decode($raw));

        // Unique response.
        if (!is_array($response)) {
            return new $entity($response);
        }

        $result = [];
        foreach ($response as $item) {
            $result[] = new $entity($item);
        }

        return $result;
    }

    /**
     * Saves the $raw string in a new file.
     *
     * @param string $fileName Path of the new file.
     * @param string $raw      Data to save.
     *
     * @return bool
     */
    public static function save(string $fileName, string $raw) : bool
    {
        $result = file_put_contents($fileName, html_entity_decode($raw));

        return $result !== false;
    }
}
