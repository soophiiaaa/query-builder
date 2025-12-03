<?php

namespace Sophia\QueryBuilder\Core;

/**
 * Class Expression
 * An abstract class for anything that represents a logical SQL expression.
 */
abstract class Expression
{
    const AND_OPERATOR = 'AND';
    const OR_OPERATOR = 'OR';

    // Transforms the expression into SQL 
    abstract public function dump(): string;
}
