<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Expression;

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

    public function add(
        Expression $expression,
        string $operator = self::AND_OPERATOR 
    ): void
    {
        if (empty($this->expressions)) {
            $operator = NULL;
        }

        $this->expressions[] = $expression;
        $this->operators[]   = $operator;
    }

    public function dump(): string
    {
        if (is_array($this->expressions)) {
            if (count($this->expressions) > 0) {
                $result = '';
                foreach ($this->expressions as $i => $expression) {
                    if ($i > 0) {
                        $result .= ' ' . $this->operators[$i] . ' ';
                    }
                    $result .= $expression->dump();
                }
                return '(' . trim($result) . ')';
            }
        }
    }

    public function setProperty(
        string $property,
        mixed $value
    ): void
    {
        if (!isset($value)) {
            $this->properties[$property] = NULL;
        }

        $this->properties[$property] = $value;
    }

    public function getProperty($property): mixed
    {
        if (isset($this->properties[$property])) {
            return $this->properties[$property];
        }
    }
}
