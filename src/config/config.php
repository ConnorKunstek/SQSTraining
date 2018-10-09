<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/9/18
 * Time: 1:35 AM
 */

define('DB_SERVER', '127.0.0.1');

define('DB_USER', 'root');

define('DB_PASSWORD', 'root');

define('DB_NAME', 'SQSTrainingDB');

define('DB_PORT', '3306');

//define('DB_DSN', 'mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER);
define('DB_DSN', 'mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';port=' . DB_PORT);