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
        if (empty($values)) {
            throw new InvalidArgumentException('Values array cannot be empty');
        }

        $batch = isset($values[0]) && is_array($values[0]);

        if (!$batch) {
            $values = [$values];
        }

        $this->columns = array_keys($values[0]);

        foreach ($values as $row) {
            $count = count($row);
            $placeholders = implode(', ', array_fill(0, $count, '?'));
            $this->placeholders[] = "({$placeholders})";
        }

        return $this;
    }

    public function get(): string
    {
        $columns = implode(', ', $this->columns);
        $values  = implode(', ', $this->placeholders);

        $this->sql = "INSERT INTO {$this->table} ({$columns}) VALUES {$values}";
        return $this->sql;
    }
}
