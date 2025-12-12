<?php

require_once __DIR__ . '/../../autoload.php';

use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Components\Filter;
use Sophia\QueryBuilder\Statements\Update;

$criteria = new Criteria;
$sql = new Update;

$criteria->add(new Filter(
        'id',
        '=',
        3
    )
);

$sql->setTable('aluno');

$sql->setRowData('nome', 'Pedro Cardoso da Silva');
$sql->setRowData('rua', 'Machado de Assis');
$sql->setRowData('fone', '(88) 4444-5555');

$sql->setCriteria($criteria);

echo $sql->getInstruction() . "\n";
