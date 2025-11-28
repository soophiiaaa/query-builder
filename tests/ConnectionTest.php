<?php

require_once __DIR__ . '/../bootstrap.php';

use Sophia\QueryBuilder\Infrastructure\Database\Connection;

$connection = Connection::define();
var_dump($connection);
