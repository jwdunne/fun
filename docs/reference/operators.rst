#########
Operators
#########

Operators are what you would expect in the mathematical sense e.g addition, subtraction, equality.

Fun provides a large number of operators as PHP functions and callable constants. These are designed to:

#. Accept primitive PHP types
#. Be used as first-class functions

When to use Fun operators
=========================

In simple cases, e.g when comparing two values known to be primitive, you should use PHP's built in operators. But, for comparing your own types or Fun types, use these operators.

Using operators
===============

To use them as functions, import as functions:

.. code-block:: php

  use function Fun\eq;

And to use them as first-class values, import as constants:

.. code-block:: php

  use const Fun\eq;


.. note:: This is because PHP has separate symbol tables for functions and constants. This may change in a near-future version of PHP.

Equivalence
===========

eq
--

.. code-block:: haskell

  eq :: Eq a -> Eq a -> Boolean

For PHP primitives, the :code:`eq` operator is equivalent to :code:`===` such that the following holds:

.. code-block:: php

  eq(1, 1) && 1 === 1

Unlike :code:`===`, :code:`eq` compares equivalence of objects that implement the type :code:`Fun\Types\Eq`.

:code:`eq` expects implementations to hold the properties of equivalence relations, namely:

* Reflexivity i.e :code:`eq($x, $x) === true`
* Symmetry i.e :code:`eq($x, $y) === eq($y, $x)`
* Transitivity i.e :code:`!(eq($x, $y) && eq($y, $z)) || eq($x, $z)`

Implementations that *do not* have these properties are errorneous.

neq
---

.. code-block:: haskell

  neq :: Eq a -> Eq a -> Boolean

:code:`neq` is defined as the complement of :code:`neq`. It is implemented in kind. Any type that implements :code:`Fun\Types\eq` gains a working :code:`neq` operator.

It is equivalent to PHP's :code:`!==` operator.

Ordering
========

* lt
* lte
* gt
* gte
* min
* max
* compare

Booleans
========

* _and
* _or
* _not
* _if
* when
* unless
* complement

Sets
====

* subset
* proper_subset
* union
* intersect
* diff
* symmetric_diff

Numerical
=========

* add
* sub
* negate
* sum
* product
* mul
* div
* power