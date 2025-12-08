# 💾🔍 Query Builder 

![status](https://img.shields.io/badge/status-in%20development-yellow)

This repository is a query builder — a tool that allows you to create database queries programmatically and visually using methods and functions instead of writing raw SQL. This makes the code more readable, secure, flexible, and easier to maintain, almost like assembling building blocks to construct statements such as `SELECT`, `WHERE`, and `ORDER BY` in an intuitive way, independent of the database engine.

The development of this component has been a major learning experience. I'm improving my programming logic, adopting better practices, and gaining a deeper understanding of software architecture, testing, and security.

## How to Install and Run

### Requirements
- PHP 8.0+
- Composer
- PostgreSQL
- Dotenv library (`vlucas/phpdotenv`)

> **Note:** This project is currently under development, and at the moment it only works with **PostgreSQL**. It will soon be adapted to support other database types.

### 1. Clone the repository
```bash
git clone https://github.com/soophiiaaa/query-builder.git
cd query-builder
````
### 2. Install dependencies
```bash
composer install
```

### 3. Environment configuration
Copy the example env file and fill in your values:
```bash
cp .env.example .env
```

Edit `.env` and set database credentials, etc:
```
DB_HOST=localhost
DB_PORT=3306
DB_USER=root
DB_PASSWORD=
DB_NAME=your_database
```

### 4. Generate autoload files
```bash
composer dump-autoload
```

## How to Use
Here’s a simple example showing how to build a SQL query using this Query Builder with Insert:

```php
<?php

use Sophia\QueryBuilder\Core\Insert;

require_once __DIR__ . '/../../bootstrap.php';

$sql = new Insert;

$sql->setTable('pessoa');

$sql->setRowData('codigo', 'abc');
$sql->setRowData('nome', 'Ameixa');

$pdo = $sql->getInstruction();

$connection->exec($pdo);

```

## Credits

It was truly a challenge to begin building this query builder, as I didn’t even know where to start. I found an excellent book that helped me a lot and became my guide throughout the entire process:

***“PHP Programando com Orientação a Objetos”* by Pablo Dall'Oglio**

The only note is that I read the 2nd Edition, which was written for PHP 5. Even so, it was interesting to adapt the code to a more modern version of the language.
