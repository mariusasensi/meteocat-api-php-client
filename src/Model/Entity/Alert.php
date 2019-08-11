<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity;

use Meteocat\Model\Common\Response;
use Meteocat\Model\Common\Entity;
use Meteocat\Model\Entity\Auxiliary\Meteor;
use Meteocat\Model\Entity\Auxiliary\Notice;
use Meteocat\Model\Entity\Auxiliary\Status;
use stdClass;

/**
 * Class Alert
 *
 * @package Meteocat\Model\Entity
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Alert extends Entity implements Response
{
    /**
     * @var Status|null
     */
    private $status = null;

    /**
     * @var Meteor|null
     */
    private $meteor = null;

    /**
     * @var array
     */
    private $notices = [];

    /**
     * Alert constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $status = $this->getPropertyData($data, 'estat');
        if ($status !== null) {
            $this->status = new Status((object)$status);
        }

        $meteor = $this->getPropertyData($data, 'meteor');
        if ($meteor !== null && !empty($meteor->nom)) {
            $this->meteor = new Meteor((string)$meteor->nom);
        }

        $notices = $this->getPropertyData($data, 'avisos');
        if (is_array($notices)) {
            foreach ($notices as $notice) {
                $this->notices[] = new Notice((object)$notice);
            }
        }
    }

    /**
     * @return Status|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * @return Meteor|null
     */
    public function getMeteor(): ?Meteor
    {
        return $this->meteor;
    }

    /**
     * @return array
     */
    public function getNotices(): array
    {
        return $this->notices;
    }
}
