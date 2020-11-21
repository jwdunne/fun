SHELL = /bin/sh

.PHONY: test check info tools

test: tools
	./tools/phpunit

check: tools
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