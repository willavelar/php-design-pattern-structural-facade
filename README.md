## Facade

Facade is a structural design pattern that provides a simplified interface to a library, a framework, or any other complex set of classes.

-----

We need to create a discount calculato rsaving to a log abstraction
### The problem

If we do it this way, every time we would need to pass which log abstraction we would be using, respecting dependency injection

```php
<?php
class Budget 
{
    public float $value;
    public int $items;
}
```
```php
<?php
class DiscountCalculator
{
    public function calc(Budget $budget, Log $log) : float
    {
        $discountCalc = $budget->value *  0.1;
        
        $log->save($discountCalc);

        return $discountCalc;
    }
}
```
```php
<?php
interface Log
{
    public function save(string $info) : void;
}
```
```php
<?php
class RedisLog implements Log
{
    public function save(string $info): void
    {
        // TODO: Implement save() method.
    }
}
```

### The solution

Now, using the Facade pattern, we have given just one port of the functionality, and within the method it will execute all the complexity of the logic, such as saving the log in the abstraction.

```php
<?php
class DiscountCalculator
{
    public function calc(Budget $budget) : float
    {
        $discountCalc = $budget->value *  0.1;

        (new RedisLog())->save($discountCalc);

        return $discountCalc;
    }
}
```

-----

### Installation for test

![PHP Version Support](https://img.shields.io/badge/php-7.4%2B-brightgreen.svg?style=flat-square) ![Composer Version Support](https://img.shields.io/badge/composer-2.2.9%2B-brightgreen.svg?style=flat-square)

```bash
composer install
```

```bash
php wrong/test.php
php right/test.php
```