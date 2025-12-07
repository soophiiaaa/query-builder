<?php

namespace Sophia\QueryBuilder\Core;

use InvalidArgumentException;

final class Operators
{
    public const AND                    = 'AND';
    public const OR                     = 'OR';
    public const EQUAL                  = '=';
    public const NOT_EQUAL              = '!=';
    public const GREATHER_THAN          = '>';
    public const LESS_THAN              = '<';
    public const GREATHER_THAN_OR_EQUAL = '>=';
    public const LESS_THAN_OR_EQUAL     = '<=';
    public const LIKE                   = 'LIKE';
    public const NOT_LIKE               = 'NOT LIKE';
    public const IN                     = 'IN';
    public const IN_NOT                 = 'IN NOT';
    public const IS                     = 'IS';
    public const IS_NOT                 = 'IS NOT';

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
