<?php

namespace Sophia\QueryBuilder\Database;

use PDO;
use PDOException;
use RuntimeException;

class Connection
{
    private static ?PDO $connection = null;

    private function __construct() {}

    public static function connect(?array $config = null): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

         if (($config['driver'] ?? null) === 'sqlite') {
        self::$connection = new PDO(
            'sqlite::memory:',
            null,
            null,
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

        return self::$connection;
    }

        $config ??= [
            'host'     => $_ENV['DB_HOST']     ?? null,
            'user'     => $_ENV['DB_USER']     ?? null,
            'password' => $_ENV['DB_PASSWORD'] ?? null,
            'dbname'   => $_ENV['DB_NAME']     ?? null,
            'port'     => $_ENV['DB_PORT']     ?? null,
        ];

        foreach ($config as $key => $value) {
            if ($value === null) {
                throw new RuntimeException("Database config '{$key}' is missing.");
            }
        }

        $dsn = sprintf(
            "pgsql:host=%s;port=%s;dbname=%s;options='--client_encoding=UTF8'",
            $config['host'],
            $config['port'],
            $config['dbname']
        );

        try {
            self::$connection = new PDO(
                $dsn,
                $config['user'],
                $config['password'],
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );

            return self::$connection;
        } catch (PDOException $e) {
            throw new RuntimeException(
                'Error connecting to database',
                0,
                $e
            );
        }
    }
}
