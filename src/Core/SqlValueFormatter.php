<?php

namespace Sophia\QueryBuilder\Core;

use Sophia\QueryBuilder\Core\Literals;

class SqlValueFormatter
{
    public function format(mixed $value): string
    {
        if (is_array($value)) {
            $formattedValue = $this->complexValues($value);
            return $formattedValue;
        }

        $formattedValue = $this->scalarValues($value);

        return $formattedValue;
    }

    public function scalarValues(mixed $value): mixed
    {
        if (is_string($value)) {
            $value = addslashes($value);
            $result = "'$value'";
            return $result;
        }

        if (is_null($value)) {
            $result = Literals::NULL;
            return $result;
        }

        if (is_bool($value)) {
            $result = $value ? Literals::TRUE : Literals::FALSE;
            return $result;
        }

        return $value;
    }

    public function complexValues(mixed $value): mixed
    {
        $formattedValues = array_map(
            [$this, 'scalarValues'],
            $value
        );

        return '(' . implode(',', $formattedValues) . ')';
    }
}
