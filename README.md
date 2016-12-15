# Iota PHP Client

PHP library to use IRI (Iota) API & a command line utility to help node management and tangle queries.

Requirements: PHP5+ for the php library alone
Linux for the command line utiliy

## Instalation

If you have git installed:

```mkdir iota-php-client; git clone https://github.com/websioux/iota-php-client.git```

else

```unzip iota-php-client-master.zip; mv iota-php-client-master iota-php-client```

## To use with PHP projects

Add
```<?php require('/PATH_TO/iota-php-client/params.php') ?>```
to your PHP project

## SET UP Command Line Utility:

1. Create custom config

```cp iota-php-client/dummy-config.php to iota-php-client/private-config.php```

2. Add iota as an alias of /PATH_TO/iota-php-client/commands/bootstrap

```echo "alias iota='/PATH_TO/iota-php-client/commands/bootstrap'" >>  ~/bash_aliases
	source ./bash_aliases```

Type
iota help 

FINISHED!
