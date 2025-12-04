<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Expression;

class Filter extends Expression
{
    private string $variable;
    private string $operator;
    private mixed $value;

    public function __construct(
        string $variable,
        string $operator,
        mixed $value
    ) {
        $this->variable = $variable;
        $this->operator = $operator;
        $this->value = $this->transform($value);
    }

    private function transform(mixed $value): string
    {
        if (is_array($value)) {
            $formattedValues = array_map(
                [$this, 'scalarValues'],
                $value
            );
            return '(' . implode(',', $formattedValues) . ')';
        }

        return $this->scalarValues($value);
    }

    private function scalarValues(mixed $value): string
    {
        if (is_string($value)) {
            $result = "'$value'";
            return $result;
        }

        if (is_null($value)) {
            $result = 'NULL';
            return $result;
        }

        if (is_bool($value)) {
            $result = $value ? 'TRUE' : 'FALSE';
            return $result;
        }

        return $value;
    }

    public function dump(): string
    {
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}
