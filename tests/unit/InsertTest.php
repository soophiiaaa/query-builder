<?php

namespace Sophia\QueryBuilder\Tests;

use PHPUnit\Framework\TestCase;
use Sophia\QueryBuilder\Statements\Insert;

class InsertTest extends TestCase
{
    public function testGenerateBasicInsert(): void
    {
        $qb = new Insert();

        $sql = $qb->into('person')
            ->values(['name' => 'John Doe', 'age' => 20])
            ->get();

        $this->assertSame("INSERT INTO person (name, age) VALUES (?, ?)", $sql);
    }

    public function testBatchInsert(): void
    {
        $qb = new Insert();
        $data = [
            ['name' => 'John Doe', 'age' => 20],
            ['name' => 'Jane Doe', 'age' => 20]
        ];

        $sql = $qb->into('person')
            ->values($data)
            ->get();

        $this->assertSame("INSERT INTO person (name, age) VALUES (?, ?), (?, ?)", $sql);
    }

    public function testInsertAvoidSqlInjection(): void
    {
        $qb = new Insert();
        $maliciousValue  = "'; DROP TABLE users' --";

        $sql = $qb->into('comments')
            ->values(['id' => 1, 'text' => $maliciousValue])
            ->get();

        $this->assertSame("INSERT INTO comments (id, text) VALUES (?, ?)", $sql);
    }
}
