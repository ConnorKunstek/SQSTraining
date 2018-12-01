<?php

require_once ("Connector.php");

session_start();
$_SESSION["TESTING_MODE"] = 1;


class FeatureLoader
{
    private static $instance;

    private $default = "0";


    public function getFeature($UID, $feature)
    {

        if ($_SESSION['TESTING_MODE']){

            $version = $this->default;


        } else {
           // echo "testing is off";
        }

        // Query database for UID and setting feature version to default if they don't exist.
        if (!$this->userExists($UID)){
            $version = $this->default;
        }

        // TODO: Query DB for feature version
        $version = $this->default;


        // TODO: Retrieve feature from repo

        // TODO:

        $filename = $feature."_".$version.".php";

        return $_SERVER['DOCUMENT_ROOT'].'/features/'.$feature.'/'.$filename;
    }

    private function userExists($uid)
    {
        try {
            $base = Connector::getDatabase();

            $sql = "";
            $stmt = $base->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();

            if (isset($result['email'])){
                return True;
            } else {
                return False;
            }

        } catch (Exception $e){
            return $e;
        }
    }


    private function queryFeature()
    {

    }





    /**
     * Singleton interface
     * @return ConfigurationInterface
     */
    public static function getInterface()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new FeatureLoader();
        }
        return self::$instance;
    }
}

//FeatureLoader::getInterface()->getFeature("1234", "youtube_video");


