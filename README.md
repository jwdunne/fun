# Fun

[![Documentation Status](https://readthedocs.org/projects/fun-php/badge/?version=latest)](https://fun-php.readthedocs.io/en/latest/?badge=latest)

Functional programming utility belt for PHP.

## Why

1. Provide a comprehensive set of well-tested functional types and functions
2. Work on primitive PHP data types
3. Make it straight-forward for developers to use, extend and integrate with
   other libraries

## Getting Started

Run:

```bash
composer require jwdunne/fun
```

Once installed, starting using the functions in your code:

```php
use function Fun\foldl;

use const Fun\_and;

echo foldl(_and, true, [true, true, true]); // === true
```

You can also integrate your own code with Fun's datatypes. Fun's functions will
work on your code, alongside PHP primitives and Fun's own datatypes:

```php
use Fun\Types\Functor;

class Box implements Functor
{
  private $value;

  public function __construct(int $value)
  {
    $this->value = $value;
  }

  public function map(callable $f): Functor
  {
    return new Box($f($this->value));
  }
}

// somewhere else:

map(fn (int $x) => $x + 1, new Box(1)) // Returns Box(2)
```

And, by implementing a Fun type, you can use a range of out-of-the-box
properties and laws. Use these in your tests to quickly verify your new type
works with a property-based testing tool:

```php
use PHPUnit\Framework\TestCase;
use QuickCheck\PHPUnit\PropertyConstraint;
use QuickCheck\Property;
use QuickCheck\Generator as Gen;

use function Fun\reflexive;

use const Fun\eq;

class EqTest extends TestCase
{
  public function test_eq_reflexivity()
  {
    $this->assertThat(
      Property::forAll([Gen::ints(), Gen::ints()], reflexive(eq)),
      PropertyConstraint::check(100)
    );
  }
}
```

In fact, all of Fun's code, where warranted, is tested this way!

## Roadmap for v0.1.0

### Project Planning

#### Functions

##### Seq

- [ ] Implement `map`
- [ ] Implement `filter`
- [ ] Implement `foldl`
- [ ] Implement `foldr`

##### Operators

###### Logical Operators

- [x] Implement `eq`
- [x] Implement `neq`
- [x] Implement `lt`
- [x] Implement `lte`
- [x] Implement `gt`
- [x] Implement `gte`
- [x] Implement `max`
- [x] Implement `min`
- [x] Implement `compare`
- [ ] Implement `_and`
- [ ] Implement `_or`
- [ ] Implement `_not`
- [ ] Implement `_xor`
- [ ] Implement `_if`
- [ ] Implement `unless`
- [ ] Implement `when`

###### Numerical Operators

- [ ] Implement `add`
- [ ] Implement `sub`
- [ ] Implement `negate`
- [ ] Implement `sum`
- [ ] Implement `product`
- [ ] Implement `mul`
- [ ] Implement `div`
- [ ] Implement `power`
