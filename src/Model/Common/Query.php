<?php

declare(strict_types=1);

namespace Meteocat\Model\Common;

/**
 * Interface Query
 *
 * @package Meteocat\Model\Query
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
interface Query
{
    /**
     * The base URL for API requests.
     */
    public const BASE_URL            = 'api.meteo.cat';
    public const DEFAULT_PROTOCOL    = 'https';
    public const DEFAULT_DATE_FORMAT = 'Y-m-d\Z';

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return string
     */
    public function getResponseClass(): string;

    /**
     * @return mixed
     */
    public function __toString(): string;
}
