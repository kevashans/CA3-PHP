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

*Accounts
- User Account Registration
- Users can log in and log out

*Forums (a collection of posts, allows better categorization)
- Users can create forums
- Users can search forums
- Users can filter forums by tags
- Users can view forums
- Users can favorite/follow forums
- Guests can search forums
- Guests can filter forums by tags
- Guests can view forums

* Tags
- Forums can be assigned by tags
- Users can create Tags

* Posts (within Forums)
- Users can create posts
- Users can edit posts
- Users can view posts
- Users can search posts
- Guests can view posts
- Guests can search posts

* Comments (within Posts)
- Users can view comments
- Users can comment
- Users can reply to other comments
- Guests can view comments

