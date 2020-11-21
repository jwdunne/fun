# Fun

[![Documentation Status](https://readthedocs.org/projects/fun-php/badge/?version=latest)](https://fun-php.readthedocs.io/en/latest/?badge=latest)

A functional programming toolkit for PHP.

## Why Fun

Fun aims to:

- Provide a complete and rich utility belt for PHP programmers
- Smooth PHP's inconsistent standard library so it's easy to recall
- Interoperate seamlessly with PHP's types

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

## Roadmap for v0.1.0

### Project Planning

#### Functions

##### Seq

- [ ] Implement `map`
- [ ] Implement `filter`
- [ ] Implement `foldl`
- [ ] Implement `foldr`

##### String

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
