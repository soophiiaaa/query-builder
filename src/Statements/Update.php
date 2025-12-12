<?php

namespace Sophia\QueryBuilder\Statements;

use Sophia\QueryBuilder\Abstract\Query;
use Sophia\QueryBuilder\Components\HasCriteria;

final class Update extends Query
{
    use HasCriteria;

    private array $columnValues;
    protected string $table;

    public function __construct(string $table)
    {
        parent::__construct();
        $this->table = $table;
    }

    public function set(string $column, mixed $value): static
    {
        $formattedValue = $this->formatter->format($value);
        $this->columnValues[$column] = $formattedValue;
        return $this;
    } 

    public function get(): string
    {
        $this->sql = "UPDATE {$this->table}";

        if ($this->columnValues) {
            foreach ($this->columnValues as $column => $value) {
                $set[] = "{$column} = {$value}";
            }
        }

        $this->sql .= ' SET ' . implode(', ', $set);

        if ($this->criteria) {
            $this->sql .= ' WHERE ' . $this->criteria->dump();
        }

        return $this->sql;
    }
}
