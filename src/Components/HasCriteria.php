<?php

namespace Sophia\QueryBuilder\Components;

use Sophia\QueryBuilder\Components\Criteria;
use Sophia\QueryBuilder\Components\Expression;
use Sophia\QueryBuilder\Components\Filter;

trait HasCriteria
{
    protected Criteria $criteria;

    public function where(string $variable, string $operator, mixed $value, ?string $logical = Expression::AND_OPERATOR): static
    {
        if (!isset($this->criteria)) {
            $this->criteria = new Criteria();
        }

        $this->criteria->add(
            new Filter(
                $variable,
                $operator,
                $value
            ),
            $logical
        );

        return $this;
    }
}
