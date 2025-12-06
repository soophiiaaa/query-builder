<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Instruction;

final class Delete extends Instruction
{
    public function getInstruction(): string
    {
        $this->sql = "DELETE FROM {$this->table}";

        if ($this->criteria) {
            $expression = $this->criteria->dump();

            if ($expression) {
                $this->sql .= ' WHERE ' . $expression;
            }
        }

        return $this->sql;
    }
}
