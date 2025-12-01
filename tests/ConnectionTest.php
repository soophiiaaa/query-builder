<?php

require_once __DIR__ . '/../bootstrap.php';

use Sophia\QueryBuilder\Infrastructure\Database\Connection;

try {
    $connection = Connection::connect();

    $query = $connection->query("SELECT codigo, nome FROM pessoa");

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($query) {
        foreach ($result as $row) {
            echo $row['codigo'] . ' - ' . $row['nome'] . "\n";
        }
        $connection = null;
    }
} catch (PDOException $e) {
    throw new \Exception("Error: {$e->getMessage()} \n");
}

// var_dump($connection);
