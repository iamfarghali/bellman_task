# Installation
#
#
#### 1- Clone Project into Your Localhost 
#
```sh
git clone https://github.com/muhammed-farghali/bellman_task.git
```
#
#### 2- Be inside Project Directory 
#
```sh
cd bellman_task
```
#
#### 3- Install Composer Dependencies
#
```sh
composer install
```
#
#### 4- Install NPM Dependencies
#
```sh
npm install
```
#
#### 5- Create .env File
#
```sh
cp .env-example .env
```
#
#### 6- Generate an App Encryption Key
#
```sh
php artisan key:generate
```
#
#### 7- Create a symbolic link from **public/storage** to **storage/app/public**
#
```sh
php artisan storage:link
```
#
#### 7- In **.env** File add Your **DB** and **Mailtrap** Credentials
#
```sh
APP_NAME=__YOUR__

DB_HOST=__YOUR__
DB_DATABASE=__YOUR__
DB_USERNAME=__YOUR___
DB_PASSWORD=__YOUR__

MAIL_USERNAME=__YOUR__
MAIL_PASSWORD=__YOUR__
MAIL_FROM_ADDRESS='test@test.test'
```
