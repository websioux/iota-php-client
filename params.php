<?php
define('PHP_LIB',dirname(__FILE__).'/');
if(file_exists(PHP_LIB.'private-config.php')) 
	require(PHP_LIB.'private-config.php');	
else 
	require(PHP_LIB.'dummy-config.php');
require(PHP_LIB .'classes/iota.php');
require(PHP_LIB .'classes/myiota.php');
