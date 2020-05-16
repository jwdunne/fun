#!/usr/bin/env bash

set -eu

while true; do find {src,tests} -name '*.php' | entr -d sh bin/check.sh; done