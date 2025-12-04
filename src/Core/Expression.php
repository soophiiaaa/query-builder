<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\SqlValueFormatter;

/**
 * Base class for all logical SQL expressions used by the query builder.
 * 
 * Each concrete expression must implement {@see dump()} to produce the
 * corresponding SQL fragment (e.g., "name = 'Sophia'", "(age > 20)", etc).
 * 
 * Expressions can be combined using logical operators such as AND and OR.
 */
abstract class Expression
{
    const AND_OPERATOR = 'AND';
    const OR_OPERATOR = 'OR';

    /** @var SqlValueFormatter Instance of SqlValueFormatter class that will
     * transform different types of values into string. */
    protected SqlValueFormatter $formatter;

    public function __construct()
    {
        $this->formatter = new SqlValueFormatter();
    }

    /**
     * Converts the expression into a raw SQL fragment.
     * 
     * This method must be return **only the SQL portion** representing the
     * expression itself, without executing anything.
     * 
     * @return string SQL representation of the expression.
     */
    abstract public function dump(): string;
}
