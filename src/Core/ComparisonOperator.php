<?php

namespace Sophia\QueryBuilder\Core;

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

    private array $validValues = ['=', '!=', '>', '<', '>=', '<=', 'LIKE', 'NOT LIKE', 'IN', 'IS NULL', 'IS NOT NULL'];
}
