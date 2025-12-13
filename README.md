# 💾🔍 Query Builder 

![status](https://img.shields.io/badge/status-in%20development-yellow)
![testing](https://img.shields.io/badge/state-under%20testing-blue)
![updates](https://img.shields.io/badge/updates-frequent-brightgreen)

This repository is a query builder — a tool that allows you to create database queries programmatically and visually using methods and functions instead of writing raw SQL. This makes the code more readable, secure, flexible, and easier to maintain, almost like assembling building blocks to construct statements such as `SELECT`, `WHERE`, and `ORDER BY` in an intuitive way, independent of the database engine.

The development of this component has been a major learning experience. I'm improving my programming logic, adopting better practices, and gaining a deeper understanding of software architecture, testing, and security.

## How to Install and Run

### Requirements
- PHP 8.0+
- Composer
- PostgreSQL
- Dotenv library (`vlucas/phpdotenv`)

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
Here’s a simple example showing how to build a SQL query using this Query Builder:

### Select
```php
$query = new QueryBuilder();

$sql = $query->select(['id', 'name'])
    ->from('students')
    ->where('age', '>', 18)
    ->limit(10)
    ->get();

echo $sql . "\n";
```

### Insert
```php
$query = new QueryBuilder();

$sql = $query->insert()
    ->into('students')
    ->values('name', 'John Doe')
    ->values('age', 22)
    ->values('course', 'Systems Development')
    ->get();

echo $sql . "\n";
```
### Update
```php
$query = new QueryBuilder();

$sql = $query->update()
    ->set('course', 'Systems Development')
    ->where('id', '=', '2')
    ->get();

echo $sql . "\n";
```

### Delete
```php
$query = new QueryBuilder();

$sql = $query->delete()
    ->from('students')
    ->where('active', '=', false)
    ->get();

echo $sql . "\n";
```

## Advanced Filtering (AND / OR)

By default, all conditions added with the `where` method are combined using the **AND** operator.

```php
$query = new QueryBuilder();

$sql = $query->select()
      ->from('students')
      ->where('age', '>', 18)
      ->where('active', '=', true);
```

To use the **OR** operator, you must pass the `logical` argument to the `where` method.
The use of **Named Arguments** (a feature of PHP 8) is recommended for better readability and clarity.

```php
$query = new QueryBuilder();

$sql = $query->select('id')
      ->from('users')
      ->where('age', '>', 18)
      ->where(
          variable: 'name',
          operator: 'LIKE',
          value: 'A%',
          logical: 'OR' // <--- Defines the logical operator for this condition
      );
```

## Credits

It was truly a challenge to begin building this query builder, as I didn’t even know where to start. I found an excellent book that helped me a lot and became my guide throughout the entire process:

***“PHP Programando com Orientação a Objetos”* by Pablo Dall'Oglio**

The only note is that I read the 2nd Edition, which was written for PHP 5. Even so, it was interesting to adapt the code to a more modern version of the language.
