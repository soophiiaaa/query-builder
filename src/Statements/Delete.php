<?php

namespace Sophia\QueryBuilder\Statements;

use Sophia\QueryBuilder\Abstract\Query;
use Sophia\QueryBuilder\Components\HasCriteria;

final class Delete extends Query
{
    use HasCriteria;

    public function get(): string
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
