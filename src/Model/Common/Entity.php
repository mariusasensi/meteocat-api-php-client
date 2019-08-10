<?php

declare(strict_types=1);

namespace Meteocat\Model\Common;

use DateTime;
use DateTimeZone;
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
     * @var array
     */
    protected static $dateFormats = [
        'Y-m-d\TH:i:s.u\Z',
        'Y-m-d\TH:i:s\Z',
        'Y-m-d\TH:i\Z',
        'Y-m-d\TH\Z',
        'Y-m-d\Z',
        'Y-m\Z',
        'Y\Z',
    ];

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

    /**
     * Returns as DateTime a property of stdClass.
     *
     * @param stdClass $data
     * @param string   $name
     *
     * @return DateTime|null
     */
    protected function getPropertyDataAsDate(stdClass $data, string $name): ?DateTime
    {
        $raw = $this->getPropertyData($data, $name);
        if ($raw !== null) {

            $iterator = 0;
            $dateTime = false;
            $countDateFormat = count(self::$dateFormats);

            // Try.
            while ($dateTime === false && $iterator < $countDateFormat) {
                $dateFormat = self::$dateFormats[$iterator];
                $iterator++;
                $dateTime = DateTime::createFromFormat($dateFormat, $raw, new DateTimeZone('UTC'));
            }

            return $dateTime === false ? null : $dateTime;
        }

        return null;
    }
}
