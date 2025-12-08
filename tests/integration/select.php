<?php

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\Expression;
use Sophia\QueryBuilder\Core\Filter;
use Sophia\QueryBuilder\Core\Select;

require_once __DIR__ . '/../../bootstrap.php';

$sql = new Select;

$criteria = new Criteria;
$criteria1 = new Criteria;
$criteria2 = new Criteria;

$sql->setTable('pessoa');

$sql->addColumn('codigo');
$sql->addColumn('nome');

$criteria1->add(new Filter(
        'codigo',
        '=',
        1
    )
);

$criteria2->add(new Filter(
        'codigo',
        '=',
        2
    )
);

$criteria->add($criteria1, Expression::OR_OPERATOR);
$criteria->add($criteria2, Expression::OR_OPERATOR);

$sql->setCriteria($criteria);

$result = $connection->query($sql->getInstruction());

if ($result) {
    foreach ($result as $row) {
        echo $row['codigo'] . ' - ' . $row['nome'] . "\n";
    }

    $connection = null;
}
