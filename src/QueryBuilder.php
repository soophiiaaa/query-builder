<?php

namespace Sophia\QueryBuilder;

use Sophia\QueryBuilder\Statements\Delete;
use Sophia\QueryBuilder\Statements\Insert;
use Sophia\QueryBuilder\Statements\Select;
use Sophia\QueryBuilder\Statements\Update;

class QueryBuilder
{
    public function select(string|array $columns = Select::STAR): Select
    {
        return new Select($columns);
    }

    public function insert(): Insert
    {
        return new Insert();
    }

    public function update(string $table): Update
    {
        return new Update($table);
    }

    public function delete(): Delete
    {
        return new Delete();
    }
}
