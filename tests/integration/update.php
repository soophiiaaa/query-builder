<?php

require_once __DIR__ . '/../../bootstrap.php';

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\Filter;
use Sophia\QueryBuilder\Core\Update;

$criteria = new Criteria;
$sql = new Update;

$criteria->add(new Filter(
        'codigo',
        '=',
        1
    )
);

$sql->setTable('pessoa');
$sql->setRowData('nome', 'Fernanda');
$sql->setCriteria($criteria);

$pdo = $sql->getInstruction();

$connection->exec($pdo);

// echo $sql->getInstruction() . "\n";
