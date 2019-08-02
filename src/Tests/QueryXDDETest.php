<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Meteocat\Model\Query\XDDE\Lightning;

/**
 * Class QueryXDDETest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class QueryXDDETest extends TestCase
{
    public function testLightningGetOfCatalunyaByDateTime()
    {
        $query = new Lightning\GetOfCatalunyaByDateTime(DateTime::createFromFormat('Y-m-d H', '2016-12-16 13'));

        $this->assertEquals('api.meteo.cat.xdde.v1.catalunya.2016.12.16.13', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xdde/v1/catalunya/2016/12/16/13', $query->getUrl());
    }

    public function testLightningGetOfCountyByDate()
    {
        $query = new Lightning\GetOfCountyByDate(31, DateTime::createFromFormat('Y-m-d', '2017-03-31'));

        $this->assertEquals('api.meteo.cat.xdde.v1.informes.comarques.31.2017.03.31', $query->getName());
        $this->assertEquals('https://api.meteo.cat/xdde/v1/informes/comarques/31/2017/03/31', $query->getUrl());
    }
}
