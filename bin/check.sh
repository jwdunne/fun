#!/usr/bin/env bash

set -eu

echo "===================="
echo "= Linting          ="
echo "===================="
echo ""
php vendor/bin/phpcs
echo ""
echo ""

echo "===================="
echo "= Testing          ="
echo "===================="
echo ""
php vendor/bin/phpunit
echo ""
echo ""

echo "===================="
echo "= Mutation Testing ="
echo "===================="
echo ""
php vendor/bin/infection
echo ""
echo ""