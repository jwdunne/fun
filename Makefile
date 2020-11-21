SHELL = /bin/sh

.PHONY: test check info tools watch

watch: tools vendor
	php vendor/bin/phpunit-watcher watch

test: tools vendor
	./tools/phpunit

check: tools vendor
	./tools/phpcs
	./tools/psalm

info: tools
	./tools/phploc src

tools: phive.xml
	yes | phive install

vendor: composer.lock
	composer install

composer.lock: composer.json
	composer update