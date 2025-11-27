<?php

namespace Sophia\QueryBuilder\Core;

abstract class Query
{
    protected array $tables = [];
    protected array $parameters = [];
    protected array $where = [];
}
