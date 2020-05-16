# Fun

Functional programming utility belt for PHP.

## Project Goals

1. Provide a comprehensive set of well-tested functional types and functions
2. Work on primitive PHP data types
3. Make it straight-forward for developers to use, extend and integrate with
  other libraries

## Roadmap for v0.1.0

### Relations & Properties

- [ ] Implement properties
  - [x] Test `symmetric` property
  - [x] Test `transitive` property
  - [ ] Implement `irreflexive` property
  - [ ] Implement `antisymmetric`
- [x] Implement `eq` tests
- [x] Implement `Relations` module
- [x] Refactor `eq` to `Relations`
  - [ ] Implement `Ord` relations
    - [ ] Implement `lt`
    - [ ] Implement `lte`
    - [ ] Implement `gt`
    - [ ] Implement `gte`
    - [ ] Implement `min`
    - [ ] Implement `max`
  - [ ] Implement `Boolean` relations
    - [ ] Implement `_and`
    - [ ] Implement `_or`
    - [ ] Implement `_not`

### Data Types

- [ ] Implement `Pair` type
- [x] Implement `Ord` type
- [ ] Implement `Boolean` type
- [ ] Implement useful instances of `Eq`
- [ ] Implement useful instances of `Ord`
- [ ] Implement `Semigroup` type
- [ ] Implement `Monoid` type
- [ ] Implement `Functor` type
- [ ] Implement `Foldable` type
- [ ] Implement `Monad` type

### Functions

- [ ] Implement `map` in terms of `Functor`
- [ ] Implement `filter`
- [ ] Implement `reject`
- [ ] Implement `foldl`
- [ ] Implement `foldr`

> This list is a work-in-progress
