<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;

/**
 * Class Alert
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Meteor extends Entity
{
    public const RAIN_ACCUMULATION = 'Acumulació de Pluja';
    public const RAIN_INTENSITY    = 'Intensitat de Pluja';
    public const WIND              = 'Vent';
    public const HOT               = 'Calor';
    public const COLD              = 'Fred';
    public const SEA               = 'Estat de la Mar';
    public const SNOW              = 'Neu';

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * Status constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        if (in_array($name, self::getAllTypes(), true)) {
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
     * @return array
     */
    public static function getAllTypes(): array
    {
        return [
            self::RAIN_ACCUMULATION,
            self::RAIN_INTENSITY,
            self::WIND,
            self::HOT,
            self::COLD,
            self::SEA,
            self::SNOW,
        ];
    }
}
