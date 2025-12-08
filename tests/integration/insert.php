<?php

use Sophia\QueryBuilder\Core\Insert;

require_once __DIR__ . '/../../bootstrap.php';

$sql = new Insert;

$sql->setTable('pessoa');

$sql->setRowData('codigo', 'abc');
$sql->setRowData('nome', 'Ameixa');

$pdo = $sql->getInstruction();

$connection->exec($pdo);
