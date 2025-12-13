<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Sophia\QueryBuilder\QueryBuilder;

$qb = new QueryBuilder();

/*$sql = $qb->select()
    ->from('students')
    ->where('age', '>', 18)
    ->orderBy('name')
    ->limit(10)
    ->get();


$sql = $qb->delete()
    ->from('students')
    ->where('age', '>', 20)
    ->get();


$sql = $qb->insert()
    ->into('students')
    ->values('name', 'Mary')
    ->values('age', 17)
    ->values('grade', '8th')
    ->get();


$sql = $qb->update('students')
    ->set('name', 'Julie')
    ->where('id', '=', 2)
    ->get();
*/

echo $sql . "\n";
