<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Sophia\QueryBuilder\QueryBuilder;

$sql = (new QueryBuilder)
    ->select(['id', 'name'])
    ->from('users')
    ->where('age', '>', 18)
    ->orderBy('name')
    ->limit(10)
    ->offset(5)
    ->get();

echo $sql . "\n";
