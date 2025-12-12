<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Sophia\QueryBuilder\Components\Filter;

$filter1 = new Filter(
    'nome',
    '=',
    'Sophia'
);

$filter2 = new Filter(
    'idade',
    '>',
    18
);

$filter3 = new Filter(
    'salario',
    '<',
    3000
);

$filter4 = new Filter(
    'data',
    'IS',
    null
);

$filter5 = new Filter(
    'descricao',
    'IS NOT',
    null
);

$filter6 = new Filter(
    'ativo',
    '=',
    true
);

$filter7 = new Filter(
    'admin',
    '=',
    false
);

$filter8 = new Filter(
    'id',
    'IN',
    [1, 2, 3]
);

$filter9 = new Filter(
    'nome',
    'IN',
    ['Ana', 'Bia', 'Carla']
);

$filter10 = new Filter(
    'nome',
    'LIKE',
    'So%'
);

echo $filter1->dump() . "\n";
echo $filter2->dump() . "\n";
echo $filter3->dump() . "\n";
echo $filter4->dump() . "\n";
echo $filter5->dump() . "\n";
echo $filter6->dump() . "\n";
echo $filter7->dump() . "\n";
echo $filter8->dump() . "\n";
echo $filter9->dump() . "\n";
echo $filter10->dump() . "\n";
