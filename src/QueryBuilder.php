<?php

namespace Sophia\QueryBuilder;

use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Components\Filter;
use Sophia\QueryBuilder\Statements\Select;

class QueryBuilder
{
    private Select $select;
    private Criteria $criteria;

    public function select(string|array $columns): self
    {
        $this->select = new Select();

        if (is_array($columns)) {
            foreach ($columns as $column) {
                $this->select->addColumn($column);
            }
        } else {
            $this->select->addColumn($columns);
        }

        return $this;
    }

    public function from(string $table): self
    {
        $this->select->setTable($table);
        return $this;
    }

    public function where(string $variable, string $operator = Operators::EQUAL, mixed $value, ?string $logical = Expression::AND_OPERATOR): static
    {
        $this->criteria = new Criteria();

        $this->criteria->add(
            new Filter(
                $variable,
                $operator,
                $value
            ),
            $logical
        );

        return $this;
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
        $this->select->setCriteria($this->criteria);
        return $this->select->getInstruction();
    }
}
