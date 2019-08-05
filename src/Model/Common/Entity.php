<?php

declare(strict_types=1);

namespace Meteocat\Model\Common;

use stdClass;

/**
 * Class Entity
 *
 * @package Meteocat\Model\Common
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Entity
{
    /**
     * Checks if a stdClass have a specific property.
     *
     * @param stdClass $data
     * @param string   $name
     *
     * @return bool
     */
    protected function hasProperty(stdClass $data, string $name): bool
    {
        return property_exists($data, $name);
    }

    /**
     * Returns the data of a stdClass property. If the property does not exist, returns $default value.
     *
     * @param stdClass $data
     * @param string   $name
     * @param null     $default
     *
     * @return mixed|null
     */
    protected function getPropertyData(stdClass $data, string $name, $default = null)
    {
        if ($this->hasProperty($data, $name)) {
            return $data->$name;
        }

        return $default;
    }
}
