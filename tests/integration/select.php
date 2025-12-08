<?php

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\Select;

require_once __DIR__ . '/../../bootstrap.php';

$sql = new Select();
$criteria = new Criteria();

$sql->setTable('pessoa');

$sql->addColumn('*');

$result = $connection->query($sql->getInstruction());

if ($result) {
    foreach ($result as $row) {
        echo $row['codigo'] . ' - ' . $row['nome'] . "\n";
    }

    $connection = null;
}
