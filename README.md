# Iota PHP Client

PHP library to use IRI (Iota) API & a command line utility to help node management and tangle queries.

Requirements: PHP5+ for the php library alone
Linux for the command line utiliy

## Instalation

If you have git installed:

```	
git clone https://github.com/websioux/iota-php-client.git
```
Il will create the folder iota-php-client

else

```
wget https://github.com/websioux/iota-php-client/archive/master.zip;
unzip iota-php-client-master.zip; 
mv iota-php-client-master iota-php-client
```

## To use with PHP projects

Add `require('/PATH_TO/iota-php-client/params.php')` to the top of your PHP project

## SET UP Command Line Utility:

* Create custom config

```
cp iota-php-client/dummy-config.php iota-php-client/private-config.php
```
and edit private-config.php with your server address.

* Add *iota* as an alias of /PATH_TO/iota-php-client/commands/bootstrap

```
iota-php-client/commands/add_alias

```

Type
```
iota help 
```
FINISHED!
