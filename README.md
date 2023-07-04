<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<br>
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<br>

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.
<br>

## Prerequisites

Here's a list of software you need to install:
<br>

PHP
Composer
Laravel
MySQL
<br>
Clone this repository: git clone [repo-url]
<br>
Navigate into the project directory: cd [project-dir]
<br>
Install PHP dependencies: composer install
<br>
Install JavaScript dependencies: npm install
<br>
Copy .env.example to .env and modify the database and other configurations as needed.
<br>
Generate a new application key: php artisan key:generate
<br>

## Configuration

Configure your .env file as per your application requirement. Make sure to update your database details and other necessary configurations.
<br>

## Database Migrations

Run the database migrations: php artisan migrate
<br>

## To run the Laravel Scheduler, use the following command:

php artisan schedule:run >> /dev/null 2>&1
<br>
To run the application: php artisan serve --port=8001
<br>
Open your web browser and visit the address localhost:8001/auth
<br>
You need to setup the service account credentials. So in storage-> app-> google-calendar(check the name!) -> service-account-credentials.json
<br>
To setup service-account-credentials follow steps below

## Setting Up Service Account Credentials

<br>
Visit the Google Cloud Platform Console at https://console.cloud.google.com/.
<br>
Navigate to the "IAM & Admin" > "Service Accounts" section.
<br>
Click on the "+ CREATE SERVICE ACCOUNT" button at the top of the page.
<br>
Enter a name for your service account and click "CREATE".
<br>
Grant this service account access to the project. You can select a role from the dropdown (For example, Project > Editor). Click "CONTINUE".
<br>
You can optionally grant users access to this service account. Once you're done, click "DONE".
<br>
Now you should be able to see your newly created service account in the service accounts list. Click on the service account.
<br>
Navigate to the "KEYS" tab.
<br>
Click on the "ADD KEY" button and select "Create new key".
<br>
For the "Key type" option, select JSON and then click on the "CREATE" button.
<br>
Your new key should start downloading automatically. Once it is downloaded, rename it to service-account-credentials.json and move it to the root of your project.
<br>
In your .env file, add GOOGLE_SERVICE_ACCOUNT_CREDENTIALS=service-account-credentials.json
<br>

## Built With

Laravel - The PHP framework used.
Vue.js 3- The JavaScript framework used.
