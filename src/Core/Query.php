<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Infrastructure\Database\Connection;
use PDO;

abstract class Query
{
    private PDO $pdo;
    protected string $table;
    protected array $bindings = [];
    protected array $where = [];

    public function __construct(
        PDO $pdo,
        string $table
    )
    {
        // Checks if pdo is empty and receives the database connection
        if (empty($pdo)) {
            $pdo = Connection::connect();
        }
        $this->pdo = $pdo;
        $this->table = $table;
    }

    abstract public function toSql(): string;

    public function execute(): array
    {
        $sql = $this->toSql();
        $statement = $this->pdo->prepare($sql);

        $statement->execute($this->bindings);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
