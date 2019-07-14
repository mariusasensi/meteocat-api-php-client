<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class QueryTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryTest extends TestCase
{
    public function testRepresentativesEstacionsQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Representatives\Estacions('080057', 32);

        $this->assertEquals('XEMA/Representatives/Estacions', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/municipis/080057/variables/32', $query->getUrl());
    }

    public function testRepresentativesMetadadesQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Representatives\Metadades();

        $this->assertEquals('XEMA/Representatives/Metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/variables', $query->getUrl());
    }

    public function testEstacionsMetadadesTotesQuery()
    {
        // Without filters.
        $query1 = new Meteocat\Model\Query\Xema\Estacions\MetadadesTotes();
        $this->assertEquals('XEMA/Estacions/MetadadesTotes', $query1->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades', $query1->getUrl());

        // With status filter.
        $query2 = new Meteocat\Model\Query\Xema\Estacions\MetadadesTotes();
        $query2
            ->withEstat('des');

        $this->assertEquals('XEMA/Estacions/MetadadesTotes', $query2->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=des', $query2->getUrl());

        // With status and date filter.
        $query3 = new Meteocat\Model\Query\Xema\Estacions\MetadadesTotes();
        $query3
            ->withData(DateTime::createFromFormat('d-m-Y H:i', '14-07-2019 14:00'))
            ->withEstat('ope');

        $this->assertEquals('XEMA/Estacions/MetadadesTotes', $query3->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/metadades?estat=ope&data=2019-07-14Z', $query3->getUrl());
    }

    public function testEstacionsMetadadesQuery()
    {
        $query = new Meteocat\Model\Query\Xema\Estacions\Metadades('UG');

        $this->assertEquals('XEMA/Estacions/Metadades', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/estacions/UG/metadades', $query->getUrl());
    }
}
