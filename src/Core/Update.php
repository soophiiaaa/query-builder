<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Instruction;

final class Update extends Instruction
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

    public function getInstruction(): string
    {
        $this->sql = "UPDATE {$this->table}";

        if ($this->columnValues) {
            foreach ($this->columnValues as $column => $value) {
                $set[] = "{$column} = {$value}";
            }
        }

        $this->sql = ' SET ' . implode(', ', $set);

        if ($this->criteria) {
            $this->sql .= ' WHERE ' . $this->criteria->dump();
        }

        return $this->sql;
    }
}
