<?php

namespace Sophia\QueryBuilder\Tests;

use PHPUnit\Framework\TestCase;
use Sophia\QueryBuilder\Statements\Insert;

class InsertTest extends TestCase
{
    public function testBasicInsert(): void
    {
        $qb = new Insert();

        $sql = $qb->into('person')
            ->values(['name' => 'John Doe', 'age' => 22, 'country' => 'Brazil'])
            ->get();

        $this->assertSame("INSERT INTO person (name, age, country) VALUES (?, ?, ?)", $sql);
    }
}
