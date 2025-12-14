<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Sophia\QueryBuilder\Components\Filter;

$filter1 = new Filter(
    'name',
    '=',
    'Sophia'
);

$filter2 = new Filter(
    'age',
    '>',
    18
);

$filter3 = new Filter(
    'wage',
    '<',
    3000
);

$filter4 = new Filter(
    'date',
    'IS',
    null
);

$filter5 = new Filter(
    'description',
    'IS NOT',
    null
);

$filter6 = new Filter(
    'active',
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
    'name',
    'IN',
    ['Ana', 'Bia', 'Carla']
);

$filter10 = new Filter(
    'name',
    'LIKE',
    'S%'
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
