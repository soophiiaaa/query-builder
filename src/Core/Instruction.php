<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Criteria;
use Sophia\QueryBuilder\Core\SqlValueFormatter;

abstract class Instruction
{
    protected string $sql;
    protected Criteria $criteria;
    protected string $table;
    protected SqlValueFormatter $formatter;

    public function __construct()
    {
        $this->formatter = new SqlValueFormatter();
    }

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
