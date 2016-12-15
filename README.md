# iota-php-client

PHP library to query IOTA servers & command line utility to help with node management and tangle queries.

Requirements: PHP5+ for the php library alone
Linux for the command line utiliy

Instalation
unzip on your machine
call /PATH_TO/iota-php-client/classes/iota.php in your php projects

To use the command line utility:
Set up config envirnement: 
Copy dummy-config.php to private-config and modify the latest

Add alias iota = ./PATH_TO/iota-php-client/commands/bootstrap in ./bash_aliases
source ./bash_aliases

Try
iota help 

FINISHED!
