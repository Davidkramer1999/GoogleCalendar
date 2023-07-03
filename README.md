Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

Prerequisites
Here's a list of software you need to install:

PHP
Composer
Node.js & npm
Laravel
MySQL (or other database system supported by Laravel)
Installing
Clone this repository: git clone [repo-url]
Navigate into the project directory: cd [project-dir]
Install PHP dependencies: composer install
Install JavaScript dependencies: npm install
Copy .env.example to .env and modify the database and other configurations as needed.
Generate a new application key: php artisan key:generate
Configuration
Configure your .env file as per your application requirement. Make sure to update your database details and other necessary configurations.

Database Migrations
Run the database migrations: php artisan migrate

Running the Laravel Scheduler
The Laravel Scheduler is used for task scheduling.

To run the Laravel Scheduler, use the following command:

bash
Copy code
php artisan schedule:run >> /dev/null 2>&1
To run the application: php artisan serve --port=8001
Open your web browser and visit the address localhost:8001/auth

Built With
Laravel - The PHP framework used.
Vue.js - The JavaScript framework used.
