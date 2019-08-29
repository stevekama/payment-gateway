<?php 
//define the path
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'xampp'.DS.'htdocs'.DS.'payments');
defined('CONFIG_PATH') ? null : define('CONFIG_PATH', SITE_ROOT.DS.'config');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'models');
defined('MAIL_PATH') ? null : define('MAIL_PATH', SITE_ROOT.DS.'vendor');

// bring in db connection 
require_once(CONFIG_PATH.DS.'database.php');

// bring in the system functions 
require_once(LIB_PATH.DS.'functions.php');

// bring in sessions 
require_once(LIB_PATH.DS.'sessions.php');

// bring in users 
require_once(LIB_PATH.DS.'users.php');

// bring in php mailer 
require_once(MAIL_PATH.DS.'autoload.php');

// bring in error logs 
require_once(LIB_PATH.DS.'error_logs.php');

// bring in auth 
require_once(LIB_PATH.DS.'auth.php');

// bring in access tokens 
require_once(LIB_PATH.DS.'access_tokens.php');

// bring in mpesa apps 
require_once(LIB_PATH.DS.'mpesa_apps.php');

// bring in mpesa transactions 
require_once(LIB_PATH.DS.'mpesa_transactions.php');

// bring in transactions 
require_once(LIB_PATH.DS.'transactions.php');