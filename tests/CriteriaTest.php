<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sophia\QueryBuilder\Core\Expression;
use Sophia\QueryBuilder\Core\Filter;
use Sophia\QueryBuilder\Core\Criteria;

$criteria = new Criteria;

$criteria->add(new Filter(
    'idade',
    '<',
    16
    ),
    Expression::OR_OPERATOR
);

$criteria->add(new Filter(
    'idade',
    '>',
    60
    ),
    Expression::OR_OPERATOR
);

echo $criteria->dump() . "\n";
