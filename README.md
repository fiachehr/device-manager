## Task Descriptions

Please run migration by --seed
I defined all device types in different conditions in seeders for the test
I attached ERD.pdf file and Postman collection in project root

## Run Locally

After pull codes<br/>
in project folder<br/><br/>

composer install<br/>
composer dump-autoload<br/>
rename .env.example to .env<br/>
php artisan key:generate<br/>
php artisan serve<br/>
php artisan migrate --seed



