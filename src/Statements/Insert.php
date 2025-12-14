<?php

namespace Sophia\QueryBuilder\Statements;

use InvalidArgumentException;
use Sophia\QueryBuilder\Abstract\Query;

final class Insert extends Query
{
    private array $columns      = [];
    private array $placeholders = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function into(string $table): self
    {
        return $this->setTable($table);
    }
    public function values(array $values): self
    {
        $this->columns = array_keys($values);

        $count = count($values);
        
        $this->placeholders = array_fill(0, $count, '?');
        return $this;
    }

    public function get(): string
    {
        $columns = implode(
            ', ',
            $this->columns
        );

        $values = implode(
            ', ',
            $this->placeholders
        );

        $this->sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";

        return $this->sql;
    }
}
