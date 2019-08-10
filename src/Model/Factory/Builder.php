<?php

declare(strict_types=1);

namespace Meteocat\Model\Factory;

use Meteocat\Model\Common\Response;
use Meteocat\Model\Exception\EntityNotFound;
use Meteocat\Model\Exception\NoDataAvailable;
use Meteocat\Model\Exception\StoreResponseAlreadyExist;
use Meteocat\Model\Exception\StoreResponseDirectoryNotFound;

/**
 * Class Builder
 *
 * @package Meteocat\Model\Factory
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Builder
{
    /**
     * Convert from JSON response to the desired entity.
     *
     * @param string $entity
     * @param string $raw
     *
     * @return Response|array
     * @throws EntityNotFound|NoDataAvailable
     */
    public static function create(string $entity, string $raw)
    {
        // Always returns a JSON, else this will return null.
        $response = json_decode(html_entity_decode($raw), false);
        if (empty($response)) {
            throw new NoDataAvailable();
        }

        if (!class_exists($entity)) {
            throw new EntityNotFound();
        }

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
     * Checks if a directory exist.
     *
     * @param string $path Directory to check.
     *
     * @return bool
     */
    public static function canUsePathToSave(string $path): bool
    {
        return !empty($path) && is_dir($path);
    }

    /**
     * Saves the $raw string in a new file.
     *
     * @param string $path    Path of the new file
     * @param string $file    File name.
     * @param string $raw     Data to save.
     * @param bool   $replace Replace if the file already exist.
     *
     * @return bool
     * @throws StoreResponseAlreadyExist|StoreResponseDirectoryNotFound
     */
    public static function save(string $path, string $file, string $raw, bool $replace = false): bool
    {
        if (!self::canUsePathToSave($path)) {
            throw new StoreResponseDirectoryNotFound();
        }

        // Name with path and file extension.
        $file = sprintf('%s/response.%s.json', $path, $file);

        if ($replace || !file_exists($file)) {
            $result = file_put_contents($file, html_entity_decode($raw));
        } else {
            throw new StoreResponseAlreadyExist();
        }

        return $result !== false;
    }
}
