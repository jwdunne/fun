##########
API Design
##########

This document describes the design principles and use cases for this library.

Design Principles
=================

1.  Self-documenting_
2.  `Ease of use`_
3.  Stability_
4.  Fail-fast_
5.  `Example driven`_
6.  `Clear naming`_
7.  Consistency_
8.  Immutability_
9.  `Type-safety`_

Self-documenting
----------------

It should be immediately obvious what an interface does just from looking at:

1.  The name
2.  Usage

Ease of use
-----------

Prioritise ease of use. Favour decisions that maintain or improve how easy an
interface is to use.

Stability
---------

Backwards incompatible changes cost the user time. And probably someone's money.
Favour backwards compatability.

If we must break BC, do so in a way in which migration can be automated.

In addition, support major versions to allow for said migration.

Fail-fast
---------

PHP is a dynamic language. To fail fast, we must:

1.  Support static analysis tools
2.  Fail-fast at run-time

This assumes extensive run-time checks of pre-conditions, post-conditions and
invariats.

Example driven
--------------

We must first produce examples of use cases for an interface before implementing
that interface. Those examples then become core to our documentation and drive
the implementation.

Clear naming
------------

Naming is crucial. Naming interfaces expands the implementation language. Adhere
to consistent naming conventions - treat naming interfaces as the expansion of a
language.

Use linguistics to assess and verify naming conventions.

Consistency
-----------

PHP evolved organically. And the standard library API shows for it. Fun's raison
d'etre is to smooth these inconsistencies.

Consistency forms patterns. The human mind loves patterns. Solid, enforced
consistency allows users to predict usage without looking up documentation.

Immutability
------------

Mutability is inherently error-prone and difficult to reason about. A utility
belt library should have little need for mutability.

Type-safety
-----------

Use static type checkers to:

1.  Ensure internal type safety
2.  Correct integration with end-user type checking tools

Use Cases
=========

PHP is a web language. It's commonly used as part of the LAMP stack.

As such, PHP is typically used to:

1.  Implement HTTP interfaces, either server-rendered or REST
2.  Reading and writing to a database e.g implementing CRUD
3.  Render data to some form of document, e.g HTML, JSON, XML, YAML
4.  Transform received data for reading from and writing to a database
5.  Validating and sanitising received input for safe use
6.  Transform fetched data queried from a database for output
7.  Validating and sanitising datbase data for safe output
8.  Consuming external 3rd party APIs using SDKs and clients
9.  Transforming values from internal representation to ones accepted by 3rd
    party APIs for querying or writing.
10.  Transforming received values from 3rd party APIs to internal
     representations.
11.  Validating and sanitising values read from 3rd party APIs
12.  Writing tests that interact with DB
13.  Writing tests that stub and fake 3rd party services
14.  Writing tests that verify data structures

We can reduce these use cases to:

- `Database interaction`_
- HTTP_
- `API Consumption`_
- `Template rendering`_
- Serialization_
- Validation_
- Sanitisation_
- `Data transformation`_
- Configuration_

Database interaction
--------------------

For DB interaction, an ORM or DBA layer is typically used. Eloquent, Laravel's
ORM, uses the 'active record pattern'. On the other hand, Doctrine uses the data
mapper pattern.

HTTP
----

For defining HTTP interfaces, some form of framework is typically used, allowing
the user to define routes and controllers, which respond to consumer requests.

These may be REST routes or implemented to look like static pages.

API Consumption
---------------

When interacting with 3rd party APIs, the user typically uses an available SDK
or uses a HTTP client.

3rd party SDKs typically accept data in the form of maps. In addition, they
return data in maps. Even if objects are used, it is common to support access a
la hash map.

Entry-points:

- In response to user input
- In response to a webhook
- In response to a scheduled task

Examples:

1. Leadflo REST API endpoint for actions due
2. Leadflo REST API endpoint for saving a patient
3. Leadflo REST API endpoint for listening on tx type changes
4. IAS Stripe integration on subscription
5. IAS Stripe integration on payment failure
6. IAS Stripe integration on payment success

Template rendering
------------------

For server-rendered apps, a templating engine is typically used, as opposed (but
not always) to interpolating PHP using tags in HTML documents. Input is
typically provided by forms. Output typically interpolates data into a HTML
template - using lists and iteration for rendering multiple records.

Serialization
-------------

For REST API implementation, JSON is typically used but may support XML. YAML is
rarely used to implement REST APIs. Responses are typically restricted to the
supported JSON data types - the complex ones being arrays and maps/objects.

In short, REST APIs serialize application data as output. But serialization is
not limited to the implementation of REST APIs.

Validation
----------

Validation is often supported by the framework. Frameworks typically provide a
means to implement new validation rules. This often leads to string
manipulations and regular expression matching and testing.

Sanitisation
------------

Sanitation is often supported by and provided by frameworks. Frameworks
typically provide means to implement new sanitisation rules. This involves
string manipulation and regular expression matching/replacement.

Data transformation
-------------------

Transforming values from one format to another typically involve iteration over
lists of maps and the transformation of one map into another map. This may also
include from one object, such as a domain model object, to a data transfer
object or an entity object from a 3rd party SDK.

Configuration
-------------

YAML is commonly used for configuration. Symfony uses YAML. But then
Symfony allows the ultimate in flexibility and thus supports multiple
configuration languages.
