<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Sophia\QueryBuilder\Statements\Insert;

$sql = new Insert;

$sql->from('aluno');

$sql->values('id', 3);
$sql->values('nome', 'Sophia Lacerda');
$sql->values('fone', '(82) 1111-2222');
$sql->values('nascimento', '2007-05-11');
$sql->values('sexo', 'F');
$sql->values('turma', '913A');
$sql->values('mensalidade', 450);

echo $sql->get() . "\n";
