<?php

namespace Sophia\QueryBuilder\Core;

use Exception;
use Sophia\QueryBuilder\Core\Instruction;

final class Insert extends Instruction
{
    private array $columnValues;

    public function set(string $column, mixed $value): void
    {
        if (is_scalar($value)) {
            if (is_string($value) && (!empty($value))) {
                $value = addslashes($value);
                $this->columnValues[$column] = "'$value'";
            }
            else if (is_bool($value)) {
                $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
            }
            else if ($value !== '') {
                $this->columnValues[$column] = $value;
            }
            else {
                $this->columnValues[$column] = "NULL";
            }
        }
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
