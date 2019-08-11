<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Auxiliary;

use Meteocat\Model\Common\Entity;
use stdClass;

/**
 * Class Notice
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Period extends Entity
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * @var array
     */
    private $affectations = [];

    /**
     * Period constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->name = $this->getPropertyData($data, 'nom');

        $affectations = $this->getPropertyData($data, 'afectacions');
        if (is_array($affectations)) {
            foreach ($affectations as $affectation) {
                $this->affectations[] = new Affectation((object)$affectation);
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
     * @return array
     */
    public function getAffectations(): array
    {
        return $this->affectations;
    }
}
