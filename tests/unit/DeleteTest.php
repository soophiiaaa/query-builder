<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Components\Filter;
use Sophia\QueryBuilder\Statements\Delete;

$criteria = new Criteria;
$sql = new Delete;

$criteria->add(new Filter(
        'id',
        '=',
        '3'
    )
);

$sql->from('aluno');
$sql->setCriteria($criteria);

echo $sql->get() . "\n";
