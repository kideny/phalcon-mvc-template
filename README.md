Phalcon-MVC-Template

![build:errored](https://api.travis-ci.org/phalconfans/Phalcon-MVC-Template.svg?branch=master)

Phalcon is a web framework delivered as a C extension providing high performance and lower resource consumption.

This is a mutli-module application for the Phalcon Framework. We expect to implement as many features as possible to showcase the framework and its potential.

Please write us if you have any feedback.

Thanks.
NOTE

Demo

![项目演示](https://github.com/kideny/phalcon-mvc-template/blob/master/samples/backend.png)

The master branch will always contain the latest stable version. If you wish to check older versions or newer ones currently under development, please switch to the relevant branch.
Get Started
Requirements

To run this application on your machine, you need at least:

    PHP >= 7.1

    Phalcon >= 3.4

    Apache Web Server with mod_rewrite enabled, and AllowOverride Options (or All) in your httpd.conf or Nginx Web Server
    Latest Phalcon Framework extension installed/enabled

    MySQL >= 5.7

Then you'll need to create the database and initialize schema:

echo 'CREATE DATABASE Phalcon-MVC-Template' | mysql -u root
cat schemas/qaytmaydi.sql | mysql -u root Phalcon-MVC-Template

Also you can override application config by creating app/config/config.php (already gitignored).
Installing Dependencies via Composer

Phalcon-MVC-Template's dependencies must be installed using Composer. Install composer in a common location or in your project:

curl -s http://getcomposer.org/installer | php

Run the composer installer:

cd Phalcon-MVC-Template
php composer.phar install

Improving this Sample

Phalcon is an open source project and a volunteer effort. Phalcon-MVC-Template does not have human resources fully dedicated to the mainteniance of this software. If you want something to be improved or you want a new feature please submit a Pull Request.
License

Phalcon-MVC-Template is open-sourced software licensed under the New MIT License.