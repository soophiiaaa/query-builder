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
    )
    {
        parent::__construct();

        $this->variable = $variable;
        $this->operator = $operator;
        $this->value    = $value;
    }
    
    public function dump(): string
    {
        $formattedValue = $this->formatter->format($this->value);
        return "{$this->variable} {$this->operator} {$formattedValue}";
    }
}
