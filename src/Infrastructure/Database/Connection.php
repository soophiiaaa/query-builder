<?php

namespace Sophia\QueryBuilder\Infrastructure\Database;

use PDO;
use PDOException;

class Connection
{
    private function __construct() {}

    public static function connect(): PDO
    {
        $host     = $_ENV['DB_HOST'];
        $user     = $_ENV['DB_USER'];
        $pass     = $_ENV['DB_PASSWORD'];
        $database = $_ENV['DB_NAME'];
        $port     = $_ENV['DB_PORT'];

        // Variable that stores the database address to simplify the connection
        $dsn = "pgsql:host={$host} port={$port} dbname={$database}";

        try {
            return new PDO(
                $dsn,
                $user,
                $pass,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            throw new \Exception("Error connecting to database: {$e->getMessage()}");
        }
    }
}
