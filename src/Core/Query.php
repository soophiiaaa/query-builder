<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Infrastructure\Database\Connection;
use PDO;
use PDOException;

abstract class Query
{
    private PDO $pdo;
    protected string $table;
    protected array $bindings = [];
    protected array $where = [];

    public function __construct(
        PDO $pdo,
        string $table
    ) {
        // Checks if pdo is empty and receives the database connection
        if (empty($pdo)) {
            $pdo = Connection::connect();
        }
        $this->pdo = $pdo;
        $this->table = $table;
    }

    // Receives the query in string format
    abstract public function toSql(): string;

    /* public function execute(): array
    {
        try {
            $sql = $this->toSql();
            $statement = $this->pdo->prepare($sql);
            $statement->execute($this->bindings);

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new \Exception("Error to execute Query: {$e->getMessage()}");
        }
    } */

    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    public function getTable(): string
    {
        return $this->table;
    }
}
