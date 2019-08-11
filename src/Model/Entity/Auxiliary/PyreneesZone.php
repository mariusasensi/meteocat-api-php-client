<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class PyreneesZone
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class PyreneesZone extends Entity
{
    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var array
     */
    private $variables = [];

    /**
     * PyreneesZone constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->id = $this->getPropertyData($data, 'idZona', 0);
        $this->name = $this->getPropertyData($data, 'nom');

        $variables = $this->getPropertyData($data, 'variablesValors');
        if (is_array($variables)) {
            foreach ($variables as $variable) {
                $this->variables[] = new ForecastPyreneesVariable($variable);
            }
        }
    }

    /**
     * @return int|mixed|null
     */
    public function getId()
    {
        return $this->id;
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
    public function getVariables(): array
    {
        return $this->variables;
    }
}
