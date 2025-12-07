<?php

namespace Sophia\QueryBuilder\Core;

use InvalidArgumentException;

final class ComparisonOperator
{
    public const EQUAL                  = '=';
    public const NOT_EQUAL              = '!=';
    public const GREATHER_THAN          = '>';
    public const LESS_THAN              = '<';
    public const GREATHER_THAN_OR_EQUAL = '>=';
    public const LESS_THAN_OR_EQUAL     = '<=';
    public const LIKE                   = 'LIKE';
    public const NOT_LIKE               = 'NOT LIKE';
    public const IN                     = 'IN';
    public const IS_NULL                = 'IS NULL';
    public const IS_NOT_NULL            = 'IS NOT NULL';

    static public function validate(string $operator)
    {
        $constants = (new \ReflectionClass(__CLASS__))->getConstants();
        $operatorUpper = trim(strtoupper($operator));

        if (!in_array($operatorUpper, $constants)) {
            throw new InvalidArgumentException("Error: Invalid value, use SQL operators");
        }

        return $operatorUpper;
    }
}
