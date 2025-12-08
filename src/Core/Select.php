<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Query;

final class Select extends Query
{
    private array $columns;

    public function addColumn(string $column)
    {
        $this->columns[] = $column;
    }

    public function getInstruction(): string
    {
        $this->sql = 'SELECT ';
        $this->sql .= implode(' , ', $this->columns);
        $this->sql .= ' FROM ' . $this->table;

        if (!isset($this->criteria)) {
            return $this->sql;
        }

        $expression = $this->criteria->dump();

        if ($expression) {
            $this->sql .= ' WHERE ' . $expression;
        }

        $order  = $this->criteria->getProperty('order');
        $limit  = $this->criteria->getProperty('limit');
        $offset = $this->criteria->getProperty('offset');

        if ($order) {
            $this->sql .= ' ORDER BY ' . $order;
        }

        if ($limit) {
            $this->sql .= ' LIMIT ' . $limit;
        }

        if ($offset) {
            $this->sql .= ' OFFSET ' . $offset;
        }

        return $this->sql;
    }
}
