<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/8/18
 * Time: 11:35 PM
 */

//require_once(__DIR__.'/../config/config.ini');
require_once(__DIR__.'/../config/config.php');

class Connector extends PDO{

    private $conn;

    public function __construct(){

        $config = parse_ini_file("../config/config.ini");

        $db = $config['db'];
        $dbhost = $config['dbhost'];
        $dbport = $config['dbport'];
        $dbname = $config['dbname'];
        $dbuser = $config['dbuser'];
        $dbpass = $config['dbpass'];

        $db_dsn = "$db:dbname=$dbname;host=$dbhost;port=$dbport";
        //$db_dsn = "$db:dbname=$dbname;host=$dbhost";

        try{
            //$this->conn = new PDO($db_dsn, $dbuser, $dbpass);
            $this->conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function getDatabase(){
        return $this->conn;
    }

}