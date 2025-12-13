<?php

namespace Sophia\QueryBuilder\Statements;

use Sophia\QueryBuilder\Abstract\Query;
use Sophia\QueryBuilder\Components\HasCriteria;

final class Select extends Query
{
    use HasCriteria;

    public const STAR = '*';

    private array $columns = [];

    public function __construct(string|array $columns = self::STAR)
    {
        $this->columns = is_array($columns) ? $columns : [$columns];
    }

    public function from(string $table): self
    {
        return $this->setTable($table);
    }

    public function orderBy(string $column): self
    {
        $this->criteria->setProperty('order', $column);
        return $this;
    }

    public function limit(int $number): self
    {
        $this->criteria->setProperty('limit', $number);
        return $this;
    }

    public function offset(int $number): self
    {
        $this->criteria->setProperty('offset', $number);
        return $this;
    }

    public function get(): string
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
