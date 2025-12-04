<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Criteria;

abstract class Instruction
{
    protected string $sql;
    protected Criteria $criteria;
    protected string $table;

    final public function setTable(string $table): void
    {
        $this->table = $table;
    }

    final public function getTable(): string
    {
        return $this->table;
    }

    public function setCriteria(Criteria $criteria): void
    {
        $this->criteria = $criteria;
    }

    abstract public function getInstruction();
}
