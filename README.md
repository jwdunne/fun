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

echo foldl(_and, true, [true, true, true]) // === true
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

- [ ] Consider reducing the scope of the project for v0.1.0
- [ ] Consider moving to GitHub for managing this document
- [ ] List unimplemented properties for:
  - [ ] `lt`
  - [ ] `lte`
  - [ ] `gt`
  - [ ] `gte`
  - [ ] `min`
  - [ ] `max`
  - [ ] `compare`
- [ ] Consider FantasyLand compatibility
- [x] Research how modern, popular packages generate docs
  - [x] Set up Sphinx and ReadTheDocs
- [ ] Consider using Haskell type defintions
- [ ] Consider refactoring relations in terms of a single primitive of that type
- [ ] Design a way to compose properties into laws.
- [ ] Build a list of laws for each algebraic structure / type
  - [ ] Monoid
  - [ ] Ord
  - [ ] Eq / Setoid
  - [ ] Boolean
  - [ ] Filterable
  - [ ] Monad
  - [ ] Functor
  - [ ] Category
  - [ ] Group
  - [ ] Ring
  - [ ] Field
  - [ ] Module
  - [ ] Vector
  - [ ] Vector Space
- [x] Consider move to Phive for tooling
- [ ] Implement GitHub Actions CI

### Properties & Laws

- [ ] Implement properties
  - [x] Test `symmetric` property
  - [x] Test `transitive` property
  - [x] Implement `irreflexive` property
  - [x] Test `irreflexive` property
  - [x] Implement `antisymmetric`
  - [x] Test `antisymmetric` property
  - [ ] Document `symmetric` property
  - [ ] Document `transitive` property
  - [ ] Document `irreflexive` property
  - [ ] Document `antisymmetric` property
- [ ] Implement laws
  - [ ] Implement `monoid_laws`
  - [ ] Implement `setoid_laws`

### Operators

- [x] Implement `eq` tests
- [x] Implement `Relations` module
- [x] Refactor `eq` to `Relations`
- [x] Rename `Relations` to `Operators`
- [x] Document `eq`
- [x] Document `neq`
- [ ] Document `Operators`
  - [ ] Complete `Ord` operators
    - [ ] Complete `lt`
      - [ ] Document `lt`
      - [ ] Implement `lt`
      - [ ] Test `lt`
    - [ ] Complete `lte`
      - [ ] Document `lte`
      - [ ] Implement `lte`
      - [ ] Test `lte`
    - [ ] Complete `gt`
      - [ ] Document `gt`
      - [ ] Implement `gt`
      - [ ] Test `gt`
    - [ ] Complete `gte`
      - [ ] Document `gte`
      - [ ] Implement `gte`
      - [ ] Test `gte`
    - [ ] Complete `min`
      - [ ] Document `min`
      - [ ] Implement `min`
      - [ ] Test `min`
    - [ ] Complete `max`
      - [ ] Document `max`
      - [ ] Implement `max`
      - [ ] Test `max`
    - [ ] Complete `compare`
      - [ ] Document `compare`
      - [ ] Implement `compare`
      - [ ] Test `compare`
  - [ ] Complete `Boolean` operators
    - [ ] Complete `boolean`
      - [ ] Document
      - [ ] Implement
      - [ ] Test
    - [ ] Complete `_and`
      - [ ] Document
      - [ ] Implement
      - [ ] Test
    - [ ] Complete `_or`
      - [ ] Document
      - [ ] Implement
      - [ ] Test
    - [ ] Complete `_not`
      - [ ] Document
      - [ ] Implement
      - [ ] Test
    - [ ] Complete `_if`
      - [ ] Document
      - [ ] Implement
      - [ ] Test
    - [ ] Complete `when`
      - [ ] Document
      - [ ] Implement
      - [ ] Test
    - [ ] Complete `unless`
      - [ ] Document
      - [ ] Implement
      - [ ] Test
    - [ ] Complete `complement`
      - [ ] Document
      - [x] Implement
      - [ ] Test
  - [ ] Implement `Set` operators
    - [ ] Complete `subset`
      - [ ] Document
      - [ ] Implement
      - [ ] Test
    - [ ] Complete `union`
    - [ ] Complete `intersect`
  - [ ] Implement `Numeric` operators
    - [ ] Implement `add`
    - [ ] Implement `sub`
    - [ ] Implement `negate`
    - [ ] Implement `sum`
    - [ ] Implement `product`
    - [ ] Implement `mul`
    - [ ] Implement `div`
    - [ ] Implement `power`

### Data Types

- [ ] Implement `Pair` type
- [x] Implement `Ord` type
- [ ] Improve types of `Ord` and `Eq`
- [ ] Implement `Boolean` type
- [ ] Implement `Filterable` type
- [ ] Implement useful instances of `Eq`
- [ ] Implement useful instances of `Ord`
- [ ] Implement `Semigroup` type
- [ ] Implement `Monoid` type
- [ ] Implement `Foldable` type
- [ ] Implement `Functor` type
- [ ] Implement `Monad` type
- [ ] Implement `Numeric` type
- [ ] Implement `Integer` subtype of `Numeric`?
- [ ] Implement `Rational` type
- [ ] Implement `Set` type
- [ ] Implement traits that implement these types based on one method
  - [ ] Implement `Equatable` trait
  - [ ] Implement `Orderable` trait
- [ ] Simplify definitions of Ord and Eq.

### Functions

- [ ] Implement `Functor` functions
  - [ ] Implement `map`
- [ ] Implement `Filterable` functions
  - [ ] Implement `filter`
  - [ ] Implement `reject`
- [ ] Implement `Foldable` functions
  - [ ] Implement `foldl`
  - [ ] Implement `foldr`
- [ ] Implement `_List` functions
  - [ ] Implement `_list`
  - [ ] Implement `head`
  - [ ] Implement `tail`
  - [ ] Implement `last`
- [ ] Implement `Tuple` functions
  - [ ] Implement `pair`
  - [ ] Implement `triple`
  - [ ] Implement `tuple`
  - [ ] Implement `fst`
  - [ ] Implement `snd`
  - [ ] Implement `thrd`
  - [ ] Implement `swap`

> This list is a work-in-progress
