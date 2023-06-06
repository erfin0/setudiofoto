# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).
## Installation

Use these steps to create a local installation for development and testing.

1. Clone the repo: `git clone https://github.com/erfin0/setudiofoto.git`
2. Work in the repo directory: `cd setudiofoto`
3. Make sure the **writable** folder is accessible: `chmod -R 777 writable` (linux)
4. Install dependencies: `composer install`
5. Create your **.env** file: `cp env .env`
6. Edit **.env** and set at least the following:
	* `CI_ENVIRONMENT = development`		
    * `database.default.hostname = localhost`
    * `database.default.database = [namadatabase]`
    * `database.default.username = [user anda]`
    * `database.default.password = [password] `
    * `database.default.DBDriver = MySQLi`

The website is intended to live on the same server as the forums, and uses the forum
database to pull in the most recent posts. When developing locally, this poses a challenge.
To make local development simpler, a migration and seed have been provided to setup a 
table with some mock data that can be used in place of having a local MyBB install.

1. Migrate the database: `php spark migrate -all`
2. Run the seeder: `php spark db:seed All`

At this point you should have a usable version of the current code! Try launching it locally:

1. From the repo directory start serving the website: `php spark serve`
2. In your web browser of choice navigate to the local URL: `http://localhost:8080`

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!



## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
