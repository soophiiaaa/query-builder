<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Components\Filter;
use Sophia\QueryBuilder\Statements\Select;

$criteria = new Criteria;
$sql = new Select;

$criteria->add(new Filter(
        'preco',
        '>',
        50
    )
);

$sql->setTable('produto');

$sql->addColumn('nome');
$sql->addColumn('preco');

$sql->setCriteria($criteria);

echo $sql->getInstruction() . "\n";
