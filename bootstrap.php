<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Sophia\QueryBuilder\Infrastructure\Database\Connection;

try {
    $connection = Connection::connect();
} catch (PDOException $e) {
    throw new \Exception("Error: {$e->getMessage()}");
}
