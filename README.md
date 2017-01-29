# Introduction

Generate a number or a list of numbers between a given minimum and maximum.
The default implementation is based on the
[CSPRNG](http://php.net/manual/en/book.csprng.php)
implementation introduced in PHP 7.

# Installation

```shell
composer require hylianshield/number-generator:^1.0
```

# Usage

```php
<?php
use HylianShield\NumberGenerator\NumberGenerator;

$generator = new NumberGenerator();
$generator->generateNumber(); // Number between 0 and PHP_INT_MAX
$generator->generateNumber(12); // Number between 12 and PHP_INT_MAX
$generator->generateNumber(42, 1337); // Number between 42 and 1337

// List of 10 numbers between 42 and 1337.
$numbers = iterator_to_array(
    $generator->generateList(10, 42, 1337)
);
```

To generate an example, try running:

```shell
composer example 10 42 1337
```

Output will be similar to:

```
> ./examples/basic-range.php '10' '42' '1337'
685
993
472
977
876
997
459
281
529
1287
```
