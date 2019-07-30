<?php

declare(strict_types=1);

namespace Meteocat\Provider;

use Meteocat\Http\Client;

/**
 * Class Meteocat
 *
 * @package Meteocat\Model
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Meteocat extends Client
{
    /**
     * Meteocat constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        parent::__construct();

        $this->setToken($token);
    }
}
