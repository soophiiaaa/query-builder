<?php

namespace Sophia\QueryBuilder\Core;

use Exception;
use Sophia\QueryBuilder\Core\Instruction;

final class Insert extends Instruction
{
    private array $columnValues;

    public function __construct()
    {
        parent::__construct();
    }

    public function setRowData(string $column, mixed $value): void
    {
        $formattedValue = $this->formatter->format($value);
        $this->columnValues[$column] = $formattedValue;
    }

    public function setCriteria(Criteria $criteria): void
    {
        throw new Exception("Cannot call setCriteria from" . __CLASS__);
    }

    public function getInstruction(): string
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
