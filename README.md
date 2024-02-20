# The Black Journal! Installation Guide

Hello, my name is Eromosere Etieyibo, and this is a step by step process in how to install, and run my project on your device. Please be sure to properly download and install the needed software to run this project on your device, and follow the steps closely. I look forward to showing you my web application, The Black Journal!. Thanks.

## Prerequisites

Before you begin with following the outlined steps, ensure that you have the following softwares installed on your system:

-   [Git](https://git-scm.com/)
-   [Composer](https://getcomposer.org/)
-   [PHP](https://www.php.net/) (Laravel requires PHP 8.1 or higher)

## Step 1: Clone the Repository

```
git clone https://github.com/Eromosere/TheBlackJournal_
```

## Step 2: Navigate to the Project Directory

```
cd TheBlackJournal_
```

## Step 3: Install Dependencies

```
composer install
```

This command installs the required PHP packages, needed to run the Laravel project.

## Step 4: Create a copy of the Environment File

```
cp .env.example .env
```

## Step 5: Generate Application Key

```
php artisan key:generate
```

This command generates a unique application key for your Laravel project.

## Step 6: Configure the Database for the Project

Open the '.env' file in a text editor and configure the database connection settings.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=theblackjournal
DB_USERNAME=root
DB_PASSWORD=
```

##Step 7: Run Migrations

```
php artisan migrate
```

This command creates the necessary database tables.

##Step 8: Serve the Application

```
php artisan serve
```
