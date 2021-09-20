# Chisel
Chisel is part of the Gotchiminer back-end, and is used to configure game modes, worlds and various other components of Gotchiminer.

## Introduction
Chisel is part of the back-end of Gotchiminer. It provides a graphical user interface manage the game, and an [REST](https://en.wikipedia.org/wiki/Representational_state_transfer) API. The REST API is meant to be public, and is meant to provide the data that was entered in the management console to users.

# Getting started
To start working on Chisel, you will need to have some software installed on your system. We'll start with the basics. You might also want to read the [laravel](https://laravel.com) documentation on [how to get started](https://laravel.com/docs/8.x/installation#your-first-laravel-project).

## Software to install:

* PHP - Firstly you will need to install [PHP](https://www.php.net/). PHP is a popular general-purpose scripting language that is especially suited to web development. It is needed to run Chisel, as well as to some development tools.

* Node.js - You will also need to install [Node.js](https://nodejs.org/en/). Part of Node.js is [NPM](https://www.npmjs.com/) which we need to install some of Chisel's javascript dependencies. 

* Composer - Finally we need [Composer](https://getcomposer.org/). Composer is a package manager for PHP. We need it to install Chisel's PHP dependencies.

## Bootstrapping the project
Now that all our tools are installed we can get started. First, clone the Chisel repository. Open a terminal window, and navigate to the root of the repository.

We need to run a few commands to download some external dependencies, and generate some code. These are the commands:
```
composer install
npm install
npm run dev
```

## Configuring the project
Most settings are stored a .env file that is placed in the root of the project. There is an template .env file called .env.example. You can make a copy of it. Then we can change it.


