# Fun

[![Documentation Status](https://readthedocs.org/projects/fun-php/badge/?version=latest)](https://fun-php.readthedocs.io/en/latest/?badge=latest)

A functional programming toolkit for PHP.

## Why Fun

Fun aims to:

- Provide a complete and rich utility belt for PHP programmers
- Smooth PHP's inconsistent standard library so it's easy to recall
- Interoperate seamlessly with PHP's types

## How it works

Fun implements a consistent and functional veneer over PHP's own standard
library. The end product is a suite of useful functions you can use in your own
work.

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

## Getting Help

This is still an early release project. I, @jwdunne, would appreciate any
feedback. All bug reports, feature requests and pull requests considered.

## Roadmap for v0.1.0

### Project Planning

Each `Build` task must:

- [ ] Specify the function
- [ ] Test the function
- [ ] Document the function
- [ ] Implement the function

#### Functions

##### Strings

Nice to have:

- [ ] Build `Str\to_upper`
- [ ] Build `Str\to_lower`
- [ ] Build `Str\capitalize`

##### Arrays

Must have:

- [ ] Build `Arr\join`
- [ ] Build `Arr\flatten`
- [ ] Build `Arr\flat_map`
- [ ] Build `Arr\group_by`
- [ ] Build `Arr\every`
- [ ] Build `Arr\any`
- [ ] Build `Arr\zip`
- [ ] Build `Arr\unzip`

Nice to have:

- [ ] Build `Arr\reject`
- [ ] Build `Arr\chunk`
- [ ] Build `Arr\sum`
- [ ] Build `Arr\product`
- [ ] Build `Arr\concat`
- [ ] Build `Arr\avg`
- [ ] Build `Arr\none`
- [ ] Build `Arr\is_proper`
- [ ] Build `Arr\to_proper`
- [ ] Build `Arr\length`
- [ ] Build `Arr\map_on`
- [ ] Build `Arr\filter_on`
- [ ] Build `Arr\reject_on`
- [ ] Build `Arr\partition`

##### Maps

Must have:

- [ ] Build `Map\get`
- [ ] Build `Map\put`
- [ ] Build `Map\has`
- [ ] Build `Map\del`
- [ ] Build `Map\contains`
- [ ] Build `Map\merge`
- [ ] Build `Map\keys`
- [ ] Build `Map\values`
- [ ] Build `Map\exclude`
- [ ] Build `Map\pick`
- [ ] Build `Map\to_pairs`
- [ ] Build `Map\from_pairs`

Nice to have:

- [ ] Build `Map\has_shape`
- [ ] Build `Map\assert_shape`
- [ ] Build `Map\intersect`
- [ ] Build `Map\rename`
- [ ] Build `Map\is_proper`
- [ ] Build `Map\view`
- [ ] Build `Map\normalize`
- [ ] Build `Map\shape`
- [ ] Build `Map\if_has`
- [ ] Build `Map\if_contains`
- [ ] Build `Map\tabulate`
- [ ] Build `Map\to_json`
- [ ] Build `Map\to_yaml`
- [ ] Build `Map\get_in`
- [ ] Build `Map\put_in`

##### Sets

- [ ] Build `Set\union`
- [ ] Build `Set\intersect`
- [ ] Build `Set\difference`
- [ ] Build `Set\symmetric_difference`
- [ ] Build `Set\contains`
- [ ] Build `Set\if_contains`
- [ ] Build `Set\put`
- [ ] Build `Set\is_subset`
- [ ] Build `Set\is_proper_subset`
- [ ] Build `Set\from_map`
- [ ] Build `Set\from_arr`

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
