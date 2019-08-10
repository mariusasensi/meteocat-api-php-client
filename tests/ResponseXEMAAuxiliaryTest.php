<?php

declare(strict_types=1);

use Meteocat\Model\Entity;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\XEMA\Auxiliary;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseXEMAAuxiliaryTest
 *
 * @author Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class ResponseXEMAAuxiliaryTest extends TestCase
{
    public function testAuxiliaryGetByFilters()
    {
        $query = new Auxiliary\GetByFilters(900, 'CC', DateTime::createFromFormat('Y-m-d', '2017-03-10'));

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetMetadataByStation()
    {
        $query = new Auxiliary\GetMetadataByStation('CC');
        $query
            ->withDate(DateTime::createFromFormat('d-m-Y', '30-03-2017'))
            ->withState('ope');

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetMetadataByFilters()
    {
        $query = new Auxiliary\GetMetadataByFilters('CC', 900);

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetAll()
    {
        $query = new Auxiliary\GetAll();

        // TODO.
        $this->markTestSkipped('TODO');
    }

    public function testAuxiliaryGetByVariable()
    {
        $query = new Auxiliary\GetByVariable(900);

        // TODO.
        $this->markTestSkipped('TODO');
    }
}
