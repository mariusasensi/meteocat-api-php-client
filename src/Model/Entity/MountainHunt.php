<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Response;
use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class MountainHunt
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class MountainHunt extends Entity implements Response
{
    /**
     * @var string|null
     */
    private $code = null;

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var Coordinate|null
     */
    private $coordinate = null;

    /**
     * @var string|null
     */
    private $slug = null;

    /**
     * @var string|null
     */
    private $type = null;

    /**
     * MountainHunt constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->code = $this->getPropertyData($data, 'codi');
        $this->name = $this->getPropertyData($data, 'descripcio');
        $this->slug = $this->getPropertyData($data, 'slug');
        $this->type = $this->getPropertyData($data, 'tipus');

        $coordinates = $this->getPropertyData($data, 'coordenades');
        if ($coordinates !== null) {
            $this->coordinate = new Coordinate((object)$coordinates);
        }
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return Coordinate|null
     */
    public function getCoordinate(): ?Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
}
