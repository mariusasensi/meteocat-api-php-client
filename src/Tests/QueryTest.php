<?php

declare(strict_types=1);

use Meteocat\Model\Query\Xema\Representatives\Estacions;
use Meteocat\Model\Query\Xema\Representatives\Metadades;
use PHPUnit\Framework\TestCase;

/**
 * Class QueryTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryTest extends TestCase
{

    public function testEstacionsQuery()
    {
        $query = new Estacions('080057', 32);

        $this->assertEquals('XEMA/Representatives/Estacions', $query->getType());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/municipis/080057/variables/32', $query->getUrl());
    }

    public function testMetadadesQuery()
    {
        $query = new Metadades();

        $this->assertEquals('XEMA/Representatives/Metadades', $query->getType());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/variables', $query->getUrl());
    }
}
