<?php

declare(strict_types=1);

namespace Meteocat\Model\Query;

use Meteocat\Model\Common\Query;

/**
 * Class Base
 *
 * @package Meteocat\Model\Query
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base implements Query
{
    /**
     * @param string $sentence
     *
     * @return false|string
     */
    protected function clear(string $sentence)
    {
        $sentence = str_replace(Query::DEFAULT_PROTOCOL . '://', '', $sentence);
        $sentence = mb_ereg_replace("([^\s\w\d.\/\-\=\?\&\,\;\[\]\(\)])", '', $sentence);
        $sentence = mb_ereg_replace("([\?\/\=\?\&])", '.', $sentence);
        $sentence = mb_strtolower($sentence);

        return $sentence;
    }
}
