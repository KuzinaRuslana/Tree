start:
	php artisan serve

install:
	composer install

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app 

prepare:
	php artisan migrate --seed

test:
	php artisan test --testsuite=Feature