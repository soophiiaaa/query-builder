<?php

namespace Sophia\QueryBuilder\Tests;

use PHPUnit\Framework\TestCase;
use Sophia\QueryBuilder\Statements\Delete;

class DeleteTest extends TestCase
{
    public function testGenerateBasicSql(): void
    {
        $qb = new Delete();

        $sql = $qb->from('students')
            ->where('id', '=', 1)
            ->get();

        $this->assertSame("DELETE FROM students WHERE (id = 1)", $sql);
    }

    public function testDeleteFailsWithoutWhereClause(): void
    {
        $qb = new Delete();

        $sql = $qb->from('students')
            ->get();
    }
}
