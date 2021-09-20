# Chisel
Chisel is part of the Gotchiminer back-end, and is used to configure game modes, worlds and various other components of Gotchiminer.

## Introduction
Chisel is part of the back-end of Gotchiminer. It provides a graphical user interface manage the game, and an [REST](https://en.wikipedia.org/wiki/Representational_state_transfer) API. The REST API is meant to be public, and is meant to provide the data that was entered in the management console to users.

# Getting started
To start working on Chisel, you will need to have some software installed on your system. We'll start with the basics. You might also want to read the [laravel](https://laravel.com) documentation on [how to get started](https://laravel.com/docs/8.x/installation#your-first-laravel-project).

## Software to install:

* [PHP](https://www.php.net/) - PHP is a popular general-purpose scripting language that is especially suited to web development. It is needed to run Chisel, as well as to some development tools.

* [Node.js](https://nodejs.org/en/) - Part of Node.js is [NPM](https://www.npmjs.com/) which is needed to install some of Chisel's javascript dependencies. 

* [Composer](https://getcomposer.org/) - Composer is a package manager for PHP. It is necessary to install Chisel's PHP dependencies.

## Bootstrapping the project
Clone the Chisel repository. Open a terminal window, and navigate to the root of the repository.

Next, you will need to download some external dependencies, and generate some code. These are the commands:
```
composer install
npm install
npm run dev
```

## Configuring the project
Most settings are stored a .env file that is placed in the root of the project. There is an template .env file called [.env.example](.env.example). You can make a copy of it. Then we can change it.

### Setting up the database
Laravel supports different kinds of databases. For development purposed it easiest to use SQLite. Open the .env file, and change these settings:
```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
DB_FOREIGN_KEYS=true
```

### Generating application key and configuring storage
You can use artisan for this, run the following commands:
```
php artisan key:generate
php artisan storage:link
```

## Running the project
That's it! It's done. You can now use [artisan](https://laravel.com/docs/8.x/artisan) to start a local web server. You can use this command to run it:
```
php artisan serve
```
Navigate to http://localhost:8000 using your favorite browser, and you have chisel in front of you. 