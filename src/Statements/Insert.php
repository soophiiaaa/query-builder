<?php

namespace Sophia\QueryBuilder\Statements;

use Exception;
use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Abstract\Query;

final class Insert extends Query
{
    private array $columnValues = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function into(string $table): self
    {
        return $this->setTable($table);
    }
    public function values(string $column, mixed $value): self
    {
        $formattedValue = $this->formatter->format($value);
        $this->columnValues[$column] = $formattedValue;
        return $this;
    }

    public function get(): string
    {
        $this->sql = "INSERT INTO {$this->table} (";

        $columns = implode(
            ', ',
            array_keys($this->columnValues)
        );

        $values = implode(
            ', ',
            array_values($this->columnValues)
        );

        $this->sql .= "{$columns})";
        $this->sql .= " VALUES ({$values})";

        return $this->sql;
    }
}
