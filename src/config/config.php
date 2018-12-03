<?php
/**
 *
 */

// Attempting to parse database file, with hard-coded values as fall back for now
// TODO: Get rid of fallback values for production.
//if ($ini = parse_ini_file('../../../database.ini', true)){
if(false){
    $DB_SERVER = $ini['database']['hostname'];
    $DB_USER = $ini['database']['username'];
    $DB_PASSWORD = $ini['database']['password'];
    $DB_NAME = $ini['database']['name'];
    $DB_PORT = $ini['database']['port'];
} else {
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