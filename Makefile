SHELL = /bin/sh

.PHONY: test check info tools

test: tools vendor
	./tools/phpunit

check: tools vendor
	./tools/phpcs
	./tools/psalm

info: tools
	./tools/phploc src

tools: phive.xml
	phive install

vendor: composer.lock
	composer install

composer.lock: composer.json
	composer update