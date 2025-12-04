<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Insert;

$sql = new Insert;

$sql->setTable('aluno');

$sql->set('id', 3);
$sql->set('nome', 'Sophia Lacerda');
$sql->set('fone', '(82) 1111-2222');
$sql->set('nascimento', '2007-05-11');
$sql->set('sexo', 'F');
$sql->set('turma', '913A');
$sql->set('mensalidade', 450);

echo $sql->getInstruction() . "\n";
