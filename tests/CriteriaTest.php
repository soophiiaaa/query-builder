<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Expression;
use Sophia\QueryBuilder\Core\Filter;
use Sophia\QueryBuilder\Core\Criteria;

$criteria1 = new Criteria;
$criteria2 = new Criteria;
$criteria3 = new Criteria;

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

echo $criteria1->dump() . "\n";
echo $criteria2->dump() . "\n";
echo $criteria3->dump() . "\n";
