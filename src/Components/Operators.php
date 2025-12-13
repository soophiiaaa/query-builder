<?php

namespace Sophia\QueryBuilder\Components;

use InvalidArgumentException;

final class Operators
{
    public const EQUAL                  = '=';
    public const NOT_EQUAL              = '!=';
    public const GREATER_THAN           = '>';
    public const LESS_THAN              = '<';
    public const GREATER_THAN_OR_EQUAL  = '>=';
    public const LESS_THAN_OR_EQUAL     = '<=';
    public const LIKE                   = 'LIKE';
    public const NOT_LIKE               = 'NOT LIKE';
    public const IN                     = 'IN';
    public const IN_NOT                 = 'IN NOT';
    public const IS                     = 'IS';
    public const IS_NOT                 = 'IS NOT';
    public const NOT_IN                 = 'NOT IN';
    public const BETWEEN                = 'BETWEEN';

    public static function validate(string $operator)
    {
        $constants = (new \ReflectionClass(__CLASS__))->getConstants();
        $operatorUpper = trim(strtoupper($operator));

        if (!in_array($operatorUpper, $constants)) {
            throw new InvalidArgumentException("Error: Invalid value, use SQL operators");
        }

        return $operatorUpper;
    }
}
