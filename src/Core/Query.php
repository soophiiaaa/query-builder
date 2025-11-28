<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Infrastructure\Database\Connection;
use PDO;
use PDOException;

class Query
{
    private ?PDO $pdo;
    protected string $table;
    protected array $params;
    protected array $where;

    public function __construct(
        ?PDO $pdo = null
    )
    {
        if (empty($pdo)) {
            $pdo = Connection::define();
        }
        $this->pdo = $pdo;
    }
}
