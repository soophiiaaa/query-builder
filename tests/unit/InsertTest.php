<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Insert;

$sql = new Insert;

$sql->setTable('aluno');

$sql->setRowData('id', 3);
$sql->setRowData('nome', 'Sophia Lacerda');
$sql->setRowData('fone', '(82) 1111-2222');
$sql->setRowData('nascimento', '2007-05-11');
$sql->setRowData('sexo', 'F');
$sql->setRowData('turma', '913A');
$sql->setRowData('mensalidade', 450);

echo $sql->getInstruction() . "\n";
