<?php

namespace Sophia\QueryBuilder\Statements;

use LogicException;
use Sophia\QueryBuilder\Abstract\Query;
use Sophia\QueryBuilder\Components\HasCriteria;

final class Delete extends Query
{
    use HasCriteria;

    public function from(string $table): self
    {
        return $this->setTable($table);
    }

    public function get(): string
    {
        $expression = $this->criteria->dump();

        if (!$expression) {
            throw new LogicException('DELETE statement requires a WHERE clause for safety');
        }

        $this->sql = "DELETE FROM {$this->table} WHERE {$expression}";

        return $this->sql;
    }
}
