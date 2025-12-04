<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Expression;

/**
 * Represents a simple comparison expression used in SQL WHERE clauses.
 * 
 * A Filter handles expressions of the form:
 *  column operator value
 * Example outputs:
 *  "age > 18"
 *  "id = 2"
 *  "name = 'Sophia'"
 * 
 * The {@see dump()} method converts the filter into its SQL fragment.
 * Value formatting is delegated to the internal formmater, which determines
 * how strings, numbers, booleans and null values should be represented.
 * 
 * This class does not perform logical composition (AND/OR); those are handled
 * by higher-level expression types.
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
