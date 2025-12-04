<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Expression;
use Sophia\QueryBuilder\Core\Filter;
use Sophia\QueryBuilder\Core\Criteria;

$criteria1 = new Criteria;
$criteria2 = new Criteria;
$criteria3 = new Criteria;
$criteria4 = new Criteria;
$criteria5 = new Criteria;
$criteria6 = new Criteria;
$criteria7 = new Criteria;
$criteria8 = new Criteria;

$criteria1->add(new Filter(
    'idade',
    '<',
    16
    ),
    Expression::OR_OPERATOR
);

$criteria1->add(new Filter(
    'idade',
    '>',
    60
    ),
    Expression::OR_OPERATOR
);

$criteria2->add(new Filter(
    'idade',
    'IN',
    [24, 25, 26]
    )
);

$criteria2->add(new Filter(
    'idade',
    'IN NOT',
    [10]
    )
);

$criteria3->add(new Filter(
    'nome',
    'LIKE',
    'Pedro%'    
    ),
    Expression::OR_OPERATOR
);

$criteria3->add(new Filter(
    'nome',
    'LIKE',
    'Maria%'
    ),
    Expression::OR_OPERATOR
);

$criteria4->add(new Filter(
    'telefone',
    'IS NOT',
    NULL
    ),
);

$criteria4->add(new Filter(
    'sexo',
    '=',
    'F'
    )
);

$criteria5->add(new Filter(
    'UF',
    'IN',
    ['RS', 'SC', 'PR']
    )
);

$criteria5->add(new Filter(
    'UF',
    'IN NOT',
    ['AC', 'PI']
    )
);

$criteria6->add(new Filter(
    'sexo',
    '=',
    'F'
    )
);

$criteria6->add(new Filter(
    'idade',
    '>',
    18
    )
);

$criteria7->add(new Filter(
    'sexo',
    '=',
    'M'
    )
);

$criteria7->add(new Filter(
    'idade',
    '<',
    16
    )
);

$criteria8->add(
    $criteria6,
    Expression::OR_OPERATOR
);

$criteria8->add(
    $criteria7,
    Expression::OR_OPERATOR
);

echo $criteria1->dump() . "\n";
echo $criteria2->dump() . "\n";
echo $criteria3->dump() . "\n";
echo $criteria4->dump() . "\n";
echo $criteria5->dump() . "\n";
echo $criteria6->dump() . "\n";
echo $criteria7->dump() . "\n";
echo $criteria8->dump() . "\n";
