<?php
//define the core paths
//Define them as absolute peths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
//(\ for windows, / for Unix)


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'s_ecommerce');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'include');

require_once(LIB_PATH.DS.'config.php');