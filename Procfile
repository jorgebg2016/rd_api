web: vendor/bin/heroku-php-apache2 public/

worker: php artisan migrate
worker: php artisan l5-swagger:generate
worker: php artisan test --testsuite=Feature
