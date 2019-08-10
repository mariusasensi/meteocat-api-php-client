<?php

declare(strict_types=1);

use Meteocat\Model\Query\XEMA\Representative;
use PHPUnit\Framework\TestCase;

/**
 * Class QueryXEMARepresentativeTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXEMARepresentativeTest extends TestCase
{
    public function testRepresentativeGetStationByCity()
    {
        $query = new Representative\GetStationByCity('080057', 32);

        $this->assertEquals('api.meteo.cat.xema.v1.representatives.metadades.municipis.080057.variables.32',
            $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/municipis/080057/variables/32',
            $query->getUrl());
    }

    public function testRepresentativeGetAllVariableMetadata()
    {
        $query = new Representative\GetAllVariableMetadata();

        $this->assertEquals('api.meteo.cat.xema.v1.representatives.metadades.variables', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xema/v1/representatives/metadades/variables', $query->getUrl());
    }
}
