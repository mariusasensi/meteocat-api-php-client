<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class QueryXDDETest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXDDETest extends TestCase
{
    public function testLightningGetOfCatalunyaByDateTimeQuery()
    {
        $query = new Meteocat\Model\Query\XDDE\Lightning\GetOfCatalunyaByDateTime(DateTime::createFromFormat('Y-m-d H', '2016-12-16 13'));

        $this->assertEquals('XDDE/Lightning/GetOfCatalunyaByDateTime', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xdde/v1/catalunya/2016/12/16/13', $query->getUrl());
    }

    public function testLightningGetOfCountyByDate()
    {
        $query = new Meteocat\Model\Query\XDDE\Lightning\GetOfCountyByDate(31, DateTime::createFromFormat('Y-m-d', '2017-03-31'));

        $this->assertEquals('XDDE/Lightning/GetOfCountyByDate', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xdde/v1/informes/comarques/31/2017/03/31', $query->getUrl());
    }
}
