# readable-only-properties
A little trait which blocks class properties setters.

# How to use

Declare use of `ReadableOnlyProperties` trait in your class definition.

```php
<?php

class User
{
    use ReadableOnlyProperties;

    private string $name;
    private int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}
```

After creating a new instance of the User class, you can directly access to its private properties.

```php
$user = new User('Chris', 35);
echo $user->name;
```

It will result in printing out `Chris` string. But when You try to set new value for either name or age property:

```php
$user->name = 'Charlie';
```
An exception will be thrown:
```php
Fatal error: Uncaught Exception: Property name is read only in /Users/avantar/Projects/readable-only-properties/ReadableOnlyProperties.php:18
Stack trace:
#0 /Users/avantar/Projects/readable-only-properties/ReadableOnlyProperties.php(42): User->__set('name', 'Charlie')
#1 {main}
  thrown in /Users/avantar/Projects/readable-only-properties/ReadableOnlyProperties.php on line 18
```