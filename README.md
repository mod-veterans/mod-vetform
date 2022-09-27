This repo is the source code for the Apply for Armed Forces Compensation or a War Pension, an online service from the Ministry of Defence.

The service digitises the paper form of an application process which allows current or previously serving members of the UK's armed forces to claim compensation for injuries and ailments caused, or further exasperated, by their service.

The solution is built on Laravel, and requires PHP 8 and a Postgres 11 database to run as a minimum. It also connects to various services to deliver email and SMS functionality.

The solution is designed to be hosted on the UK Government's PaaS hosting platform, but for development and testing purposes can run on any standard LAMP hosting.


INSTALLATION

The solution requires Composer to install.

Simply run:

php composer.phar install

and all dependencies should be installed.

The root directory for your apache config is:

/public/

You will need to set up the following as environment variables:

SetEnv DATA_PASS_PHRASE - a unique value that is used to encrypt data within the service
SetEnv DATA_PASS_SEED - a unique seed value that is used to encrypt data within the service
SetEnv DB_HOST - Postgres DB host
SetEnv DB_PORT - Postgres DB Port
SetEnv DB_DATABASE - Name of the Postgres database to use
SetEnv DB_USERNAME - Name of the Postgres username
SetEnv DB_PASSWORD Postgres access password
SetEnv APP_STAGE - your environment (used to control availability of some online-only services): LOCAL/DEV/UAT/LIVE


The services uses standard Laravel Blade templates, though each contains a large amount of procedural code. This is for several reasons:

1. As a large service, it allows for simple locating of code when searching for problems
2. It allows quick access to code from developers who might not be familiar with Laravel's structures and mechanisms (as is likely for ongoing support)
3. It allows for rapid development in prototyping
4. It allows the service to be moved off Laravel more easily should platforms be standardised within the MOD in the future

All templates are here: /resources/views

Page structure / URLS are here: /routes/web.php



