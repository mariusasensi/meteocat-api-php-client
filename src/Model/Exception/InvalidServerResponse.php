<?php

declare(strict_types=1);

namespace Meteocat\Model\Exception;

use RuntimeException;

/**
 * Class InvalidServerResponse
 *
 * @package Meteocat\Model\Exception
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class InvalidServerResponse extends RuntimeException
{
    /**
     * @param string $query
     * @param int    $code
     *
     * @return InvalidServerResponse
     */
    public static function create(string $query, int $code = 0): self
    {
        return new self(sprintf('The server returned an invalid response (%d) for query "%s". We could not parse it.', $code, $query));
    }

    /**
     * @param string $query
     *
     * @return InvalidServerResponse
     */
    public static function emptyResponse(string $query): self
    {
        return new self(sprintf('The server returned an empty response for query "%s".', $query));
    }
}
