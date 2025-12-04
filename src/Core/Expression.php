<?php

namespace Sophia\QueryBuilder\Core;

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
    /** @var string Logical AND operator. */
    const AND_OPERATOR = 'AND';

    /** @var string Logical OR operator. */
    const OR_OPERATOR = 'OR';

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
