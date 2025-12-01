<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Expression;
use PDO;
use PDOException;

/**
 * Class Filter
 * It's a specialization of Expression Class, it represents a simples expression.
 */
class Filter extends Expression
{
    private string $variable;
    private string $operator;
    private mixed $value;

    public function __construct(
        string $variable,
        string $operator,
        mixed $value
    ) 
    {
        $this->variable = $variable;
        $this->operator = $operator;
        $this->value = $this->transform($value);
    }

    private function transform(mixed $value)
    {
        if (is_array($value)) {
            foreach ($value as $i) {
                if (is_integer($i)) {
                    $foo[] = $i;
                } else if (is_string($i)) {
                    $foo[] = "'$i'";
                }
            }
            $result = '(' . implode(',', $foo) . ')';
        } else if (is_string($value)) {
            $result = "'$value'";
        } else if (is_null($value)) {
            $result = 'NULL';
        } else if (is_bool($value)) {
            $result = $value ? 'TRUE' : 'FALSE';
        } else {
            $result = $value;
        }
        return $result;
    }

    public function dump()
    {
        
    }
}
