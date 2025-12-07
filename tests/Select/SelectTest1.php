<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\Filter;
use Sophia\QueryBuilder\Core\Select;

$criteria = new Criteria;
$sql = new Select;

$criteria->add(new Filter(
        'nome',
        'banana',
        'Maria%'
    )
);

$criteria->add(new Filter(
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

echo $sql->getInstruction() . "\n";
