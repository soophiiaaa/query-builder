<?php

namespace Sophia\QueryBuilder\Abstract;

use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Components\SqlValueFormatter;

abstract class Query
{
    protected string $sql;
    protected Criteria $criteria;
    protected string $table;
    protected SqlValueFormatter $formatter;

    public function __construct()
    {
        $this->criteria  = new Criteria();
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
