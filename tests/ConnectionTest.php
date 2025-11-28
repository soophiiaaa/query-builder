<?php

require_once __DIR__ . '/../bootstrap.php';

use Sophia\QueryBuilder\Infrastructure\Database\Connection;

$connection = Connection::connect();
var_dump($connection);
