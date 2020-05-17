# Fun

Functional programming utility belt for PHP.

## Project Goals

1. Provide a comprehensive set of well-tested functional types and functions
2. Work on primitive PHP data types
3. Make it straight-forward for developers to use, extend and integrate with
   other libraries

## Roadmap for v0.1.0

### Project Planning

- [ ] List unimplemented properties for:
  - [ ] `lt`
  - [ ] `lte`
  - [ ] `gt`
  - [ ] `gte`
  - [ ] `min`
  - [ ] `max`
- [ ] Consider FantasyLand compatibility
- [ ] Research how modern, popular packages generate docs
- [ ] Consider using Haskell type defintions
- [ ] Consider refactoring relations in terms of a single primitive of that type
- [ ] Design a way to compose properties into laws.
- [ ] Build a list of laws for each algebraic structure
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

### Properties & Laws

- [ ] Implement properties
  - [x] Test `symmetric` property
  - [ ] Document `symmetric` property
  - [x] Test `transitive` property
  - [ ] Document `transitive` property
  - [x] Implement `irreflexive` property
  - [x] Test `irreflexive` property
  - [ ] Document `irreflexive` property
  - [x] Implement `antisymmetric`
  - [x] Test `antisymmetric` property
  - [ ] Document `antisymmetric` property
- [ ] Implement laws
  - [ ] Implement `monoid_laws`
  - [ ] Implement `setoid_laws`

### Binary Relations

- [x] Implement `eq` tests
- [x] Implement `Relations` module
- [x] Refactor `eq` to `Relations`
- [ ] Document `eq`
- [ ] Document `Relations`
  - [ ] Implement `Ord` relations
    - [ ] Complete `lt`
      - [ ] Implement `lt`
      - [ ] Test `lt`
      - [ ] Document `lt`
    - [ ] Complete `lte`
      - [ ] Implement `lte`
      - [ ] Test `lte`
      - [ ] Document `lte`
    - [ ] Complete `gt`
      - [ ] Implement `gt`
      - [ ] Test `gt`
      - [ ] Document `gt`
    - [ ] Complete `gte`
      - [ ] Implement `gte`
      - [ ] Test `gte`
      - [ ] Document `gte`
    - [ ] Complete `min`
      - [ ] Implement `min`
      - [ ] Test `min`
      - [ ] Document `min`
    - [ ] Complete `max`
      - [ ] Implement `max`
      - [ ] Test `max`
      - [ ] Document `max`
    - [ ] Complete `compare`
      - [ ] Implement `compare`
      - [ ] Test `compare`
      - [ ] Implement `compare`
  - [ ] Complete `Boolean` relations
    - [ ] Complete `boolean`
      - [ ] Implement
      - [ ] Test
      - [ ] Document
    - [ ] Complete `_and`
      - [ ] Implement
      - [ ] Test
      - [ ] Document
    - [ ] Complete `_or`
      - [ ] Implement
      - [ ] Test
      - [ ] Document
    - [ ] Complete `_not`
      - [ ] Implement
      - [ ] Test
      - [ ] Document
    - [ ] Complete `_if`
      - [ ] Implement
      - [ ] Test
      - [ ] Document
    - [ ] Complete `when`
      - [ ] Implement
      - [ ] Test
      - [ ] Document
    - [ ] Complete `unless`
      - [ ] Implement
      - [ ] Test
      - [ ] Document
    - [ ] Complete `complement`
      - [x] Implement
      - [ ] Test
      - [ ] Document

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
- [ ] Implement `Numeric` functions
  - [ ] Implement `add`
  - [ ] Implement `sub`
  - [ ] Implement `negate`
  - [ ] Implement `sum`
  - [ ] Implement `product`
  - [ ] Implement `mul`
  - [ ] Implement `div`
  - [ ] Implement `power`

> This list is a work-in-progress
