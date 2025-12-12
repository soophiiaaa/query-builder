<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Components\Filter;
use Sophia\QueryBuilder\Statements\Select;

class SelectTest1 extends TestCase
{
    public function testThatFiltersDataFromPeopleCalledMariaTheCityStartsWithPortoLimitsItToTenResponsesAndSortsItAlphabetically(): void
    {
        $criteria = new Criteria;
        $sql      = new Select;

        $criteria->add(
            new Filter(
                'nome',
                'LIKE',
                'Maria%'
            )
        );

        $criteria->add(
            new Filter(
                'cidade',
                'LIKE',
                'Porto%'
            )
        );

        $criteria->setProperty('offset', 0);
        $criteria->setProperty('limit', 10);
        $criteria->setProperty('order', 'nome');

        $sql->setTable('aluno');
        $sql->addColumn('nome');
        $sql->addColumn('fone');
        $sql->setCriteria($criteria);

        $expected = "SELECT nome , fone FROM aluno WHERE (nome LIKE 'Maria%' AND cidade LIKE 'Porto%') ORDER BY nome LIMIT 10";

        $this->assertSame($expected, $sql->getInstruction());
    }
}
