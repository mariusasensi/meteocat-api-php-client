<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Entity;
use Meteocat\Model\Common\Response;
use stdClass;

/**
 * Class Symbol
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class Symbol extends Entity implements Response
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var string|null
     */
    private $description = null;

    /**
     * @var null
     */
    private $values = null;

    /**
     * Symbol constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->name        = $this->getPropertyData($data, 'nom');
        $this->description = $this->getPropertyData($data, 'descripcio');

        $symbols = $this->getPropertyData($data, 'valors');
        if ($symbols !== null) {
            foreach ($symbols as $symbol) {
                $this->values[] = new SymbolValue((object)$symbol);
            }
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return array|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }
}
