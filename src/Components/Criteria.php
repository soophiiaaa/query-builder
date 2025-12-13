<?php

namespace Sophia\QueryBuilder\Components;

use Sophia\QueryBuilder\Components\Expression;
use Sophia\QueryBuilder\Components\Operators;

class Criteria extends Expression
{
    private array $expressions;
    private array $operators;
    private array $properties;

    public function __construct()
    {
        $this->expressions = [];
        $this->operators = [];
    }

    public function add(Expression $expression, string $operator = self::AND_OPERATOR): void
    {
        if (empty($this->expressions)) {
            $this->operators[] = null;
        } else {
            $this->operators[] = Operators::validate($operator);
        }

        $this->expressions[] = $expression;
    }

    public function dump(): string
    {
        if (count($this->expressions) === 0) {
            return '';
        }

        $parts = [];

        foreach ($this->expressions as $i => $expression) {
            if ($i > 0) {
                $parts[] = $this->operators[$i];
            }

            $parts[] = $expression->dump();
        }

        return '(' . implode(' ', $parts) . ')';
    }

    public function setProperty(string $property, mixed $value): void
    {
        if (!isset($value)) {
            $this->properties[$property] = null;
        }

        $this->properties[$property] = $value;
    }

    public function getProperty(string $property): string
    {
        if (isset($this->properties[$property])) {
            return $this->properties[$property];
        }

        return '';
    }
}
