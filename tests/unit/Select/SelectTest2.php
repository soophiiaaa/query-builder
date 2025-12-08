<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\Expression;
use Sophia\QueryBuilder\Core\Filter;
use Sophia\QueryBuilder\Core\Select;

$criteria = new Criteria;
$criteria1 = new Criteria;
$criteria2 = new Criteria;

$sql = new Select;

$criteria1->add(new Filter(
        'sexo',
        '=',
        'F' 
    )
);

$criteria1->add(new Filter(
        'serie',
        '=',
        '4'
    )
);

$criteria2->add(new Filter(
        'sexo',
        '=',
        'M'
    )
);

$criteria2->add(new Filter(
        'serie',
        '=',
        '4'
    )
);

$criteria->add($criteria1, Expression::OR_OPERATOR);
$criteria->add($criteria2, Expression::OR_OPERATOR);

$criteria->setProperty('order', 'nome');

$sql->setTable('aluno');
$sql->addColumn('*');
$sql->setCriteria($criteria);

echo $sql->getInstruction() . "\n";
