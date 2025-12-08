<?php

require_once __DIR__ . '/../../bootstrap.php';

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\Delete;
use Sophia\QueryBuilder\Core\Filter;

$criteria = new Criteria;
$sql = new Delete;

$criteria->add(new Filter(
        'nome',
        '=',
        'Maria'
    )
);

$sql->setTable('pessoa');
$sql->setCriteria($criteria);

$pdo = $sql->getInstruction();

$connection->exec($pdo);
