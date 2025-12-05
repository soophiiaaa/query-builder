<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\Delete;
use Sophia\QueryBuilder\Core\Filter;

$criteria = new Criteria;
$sql = new Delete;

$criteria->add(new Filter(
        'id',
        '=',
        '3'
    )
);

$sql->setTable('aluno');
$sql->setCriteria($criteria);

echo $sql->getInstruction() . "\n";
