<?php

require_once __DIR__ . '/../../bootstrap.php';

use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Components\Filter;
use Sophia\QueryBuilder\Statements\Select;
use Sophia\QueryBuilder\Infrastructure\Database\Connection;

$sql = new Select;
$criteria = new Criteria;

$sql->from('pessoa');

$sql->dColumn('codigo');
$sql->addColumn('nome');

$criteria->add(new Filter(
        'codigo',
        '=',
        '1'
    )
);

$sql->setCriteria($criteria);

try {
    $connection = Connection::connect();

    $result = $connection->query($sql->getInstruction());

    if ($result) {
        foreach ($result as $row) {
            echo $row['codigo'] . ' - ' . $row['nome'] . "\n";
        }

        $connection = null;
    }
} catch (PDOException $e) {
    throw new \Exception("Error: {$e->getMessage()} \n");
}
