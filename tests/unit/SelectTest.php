<?php

namespace Sophia\QueryBuilder\Tests;

use PHPUnit\Framework\TestCase;
use Sophia\QueryBuilder\Statements\Select;

class SelectTest extends TestCase
{
    public function testGenerateBasicSelect(): void
    {
        $qb = new Select();

        $sql = $qb->from('person')
            ->get();

        $this->assertSame("SELECT * FROM person", $sql);
    }

    public function testSelectWithMultipleColumns(): void
    {
        $qb = new Select(['id', 'name']);

        $sql = $qb->from('person')
            ->get();

        $this->assertSame("SELECT id , name FROM person", $sql);
    }

    public function testMethodOrderDoesNotBreakSql(): void
    {
        $qb = new Select(['id', 'name']);

        $sql = $qb->where('age', '>', 18)
            ->limit(10)
            ->from('person')
            ->get();

        $this->assertSame("SELECT id , name FROM person WHERE (age > 18) LIMIT 10", $sql);
    }

    public function testMixedAndOrConditions(): void
    {
        $qb = new Select();

        $sql = $qb->from('person')
            ->where('name', 'LIKE', 'A%')
            ->where('last_name', 'LIKE', 'A%', 'OR')
            ->where('age', '>', 18, 'AND')
            ->get();

        $this->assertSame("SELECT * FROM person WHERE (name LIKE 'A%' OR last_name LIKE 'A%' AND age > 18)", $sql);
    }
}
