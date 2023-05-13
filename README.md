## Laravel 8 Complete Blog

This repository is linked to [this youtube video](https://www.youtube.com/watch?v=HKJDLXsTr8A&t=4710s) where I show you how to create a complete blog in Laravel 8 using best practices.

•	Author: Code With Dary <br>
•	Twitter: [@codewithdary](https://twitter.com/codewithdary) <br>
•	Instagram: [@codewithdary](https://www.instagram.com/codewithdary/) <br>

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone git@github.com:codewithdary/laravel-8-complete-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting <br>
Create a database <br>
```
mysql
create database laravelblog;
exit;
```

Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelblog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables
```
php artisan migrate
```

## Contributing
Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.

## Features
Our website provides the following functionality:

*Forums(a collection of posts which allows better categorization)
<img width="973" alt="image" src="https://github.com/kevashans/CA3-PHP/assets/93915338/8a7936fa-eec1-4ba7-92ff-0c2bc63c7b53">

* Tags
<img width="1265" alt="image" src="https://github.com/kevashans/CA3-PHP/assets/93915338/544c2b75-70d1-41f3-8f68-158a662065c4">

* Filter
<img width="1138" alt="image" src="https://github.com/kevashans/CA3-PHP/assets/93915338/1e671b54-fc8f-4fc0-89c3-6b86ba2d5985">

* Comments
<img width="1257" alt="image" src="https://github.com/kevashans/CA3-PHP/assets/93915338/82b64329-8e5a-4165-be2c-53fbad2e538e">
