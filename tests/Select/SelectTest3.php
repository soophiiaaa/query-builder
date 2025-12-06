<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\Filter;
use Sophia\QueryBuilder\Core\Select;

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
