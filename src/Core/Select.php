<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Instruction;

final class Select extends Instruction
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

        if ($this->criteria) {
            $expression = $this->criteria->dump();

            if ($expression) {
                $this->sql .= ' WHERE ' . $expression;
            }

            $order  = $this->criteria->getProperty('order');
            $limit  = $this->criteria->getProperty('limit');
            $offset = $this->criteria->getProperty('offset');

            if ($order) {
                $this->sql .= ' ORDER BY ' . $order;
                return $this->sql;
            }

            if ($limit) {
                $this->sql = ' LIMIT ' . $limit;
                return $this->sql;
            }

            if ($offset) {
                $this->sql = ' OFFSET ' . $offset;
                return $this->sql;
            }
        }

        return $this->sql;
    }
}
