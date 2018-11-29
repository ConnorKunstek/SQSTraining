<?php
/**
 *
 */


// Loading configuration file.  If the configuration file cannot be opened an error page is displayed to the user and
// the error is logged internally.
$config_filename = __DIR__."/../../config/config.ini";
if ($config_ini = parse_ini_file($config_filename, true)){

    // Defining some constants from the config file.
    define("VERSION", $config_ini['env']['version']);
    define("ENV", $config_ini['env']['env']);
    define("SENDMAIL", $config_ini['mail']['sendMail']);
    define("DATABASE_FILENAME", $config_ini['database']['filename']);
    define("LOG_LEVEL", $config_ini['logging']['minimumLevel']);

} else {
    error_log("Could not open config file.");
    header("Location: /src/views/error.php");
    exit();
}


// Now that the config file has been parsed the Logger is instantiated, since parts of the Logger depend on values
// being parsed from the config file.
require_once (__DIR__."/../../src/lib/Logger.php");
$logger = Logger::getInstance();
$logger->log_debug("Configuration file successfully parsed.", basename(__FILE__));


// Loading database credentials from separate file outside of root.  If the database credentials cannot be found an
// error page is displayed to the user and the error is logged internally.
// TODO: Remove hard-coded database values below.
if ($ini = parse_ini_file(__DIR__.'/../../../'.DATABASE_FILENAME, true)){

    $logger->log_debug("Successfully parsed database file.", basename(__FILE__));

    if (ENV != "development" and ENV != "production"){
        $logger->log_error("ENV is set to an invalid value=".ENV." Needs to be set to 'production' or 'development'");
        header("Location: /src/views/error.php");
        exit();
    }

    $logger->log_debug("Using a ".ENV." database.", basename(__FILE__));

    $DB_SERVER = $ini[ENV]['hostname'];
    $DB_USER = $ini[ENV]['username'];
    $DB_PASSWORD = $ini[ENV]['password'];
    $DB_NAME = $ini[ENV]['name'];
    $DB_PORT = $ini[ENV]['port'];

    // Checking to see if the database file has been configured.
    if ($DB_SERVER == "XXX"){
        $logger->log_error("Looks like the database .ini file has not been configured.", basename(__FILE__));
        header("Location: /src/views/error.php");
        exit();
    }

} else {

    $logger->log_warning("Using hard-coded values for database credentials.", basename(__FILE__));

    $DB_SERVER = '10.163.140.98';
    $DB_USER = 'remote';
    $DB_PASSWORD = 'password123';
    $DB_NAME = 'SQSTrainingDB';
    $DB_PORT = '3306';
}


// Defining database constants
define('DB_SERVER', $DB_SERVER);
define('DB_USER', $DB_USER);
define('DB_PASSWORD', $DB_PASSWORD);
define('DB_NAME', $DB_NAME);
define('DB_PORT', $DB_PORT);
define('DB_DSN', 'mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';port=' . DB_PORT);