<?php

namespace Sophia\QueryBuilder\Tests;

use PHPUnit\Framework\TestCase;
use Sophia\QueryBuilder\Statements\Update;

class UpdateTest extends TestCase
{
    public function testGenerateBasicUpdate(): void
    {
        $qb = new Update('students');

        $sql = $qb->set('course', 'Systems Development')
            ->where('id', '=', 1)
            ->get();

        $this->assertSame("UPDATE students SET course = 'Systems Development' WHERE (id = 1)", $sql);
    }
}
