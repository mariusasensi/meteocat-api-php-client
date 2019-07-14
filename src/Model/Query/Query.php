<?php

declare(strict_types=1);

namespace Meteocat\Model\Query;

/**
 * Interface Query
 *
 * @package Meteocat\Model\Query
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
interface Query
{
    /**
     * The base URL for API requests.
     */
    const BASE_URL            = 'https://api.meteo.cat';
    const DEFAULT_DATE_FORMAT = 'Y-m-d\Z';

    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return string
     */
    public function getUrl() : string;

    /**
     * @return mixed
     */
    public function __toString() : string;
}
