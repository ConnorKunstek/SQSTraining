<?php

require_once(__DIR__.'/../config/config.php');

/**
 * Custom logging class designed to be able to log information in a local logfile.  This class is designed to be used as
 * a singleton, so instead of using the 'new' keyword to instantiate a new object, use the Logger::getInstance() method
 * to get a handle to the singleton.  This is done so that only one object will ever be writing to the logfiles.
 *
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 * @example $myLogger = Logger::getInstance();
 */

class Logger{
	private static $instance;
	private $logfile;
	private $logpath;
	private $prefix;
	private $config;

	/** @var string name of log file (with extension)*/
	private $filename = 'log'; 

	/** @var string directory to where log file(s) reside */
	private $directory = '../../log/';

	/**
	 * Default Constructor
	 */

	private function __construct()
    {
        // Attempting to retrieve logfile name from config file, but defaulting to sqstraining.log if for whatever reason
        // the config file cannot be opened.
//        if ($config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/config.ini', true)) {
        if (false){
            $this->logfile = $config['logging']['filename'];
        } else {
            $this->logfile = "sqstraining.log";
        }

        $this->logpath = $_SERVER['DOCUMENT_ROOT'] . "/log/" . $this->logfile;
        $this->prefix = "INFO";
    }

    /**
     * Writes a provided message to a defined logfile location.
     * @param $msg string Message to be recorded.
     * @return bool True if writing to log succeeds, false otherwise.
     */
	public function log($msg, $filename="Logger")
    {
		$date = date('Y-m-d H:i:s');
		$message = $date." [".getmypid()."]   ".$this->prefix." - ".$filename." - ".$msg;

		if (!file_put_contents($this->logpath, $message.PHP_EOL , FILE_APPEND | LOCK_EX)){
			error_log("Log file could".$_SERVER['DOCUMENT_ROOT']."not be written to. path=".$this->logpath);
            $this->prefix = "INFO";
			return false;
		} else {
            $this->prefix = "INFO";
		    return true;
        }
	}

    /**
     * Writes a provided message to the logfile with a prefix indicating it's a warning message.
     * @param $msg string Message to be recorded.
     * @return bool True if writing to log succeeds, false otherwise.
     */
	public function log_warning($msg, $filename="Logger")
    {
	    $this->prefix = "WARNING";
		return $this->log($msg, $filename);
	}

    /**
     * Writes a provided message to the logfile with a prefix indicating it's an error message.
     * @param $msg string Message to be recorded.
     * @return bool True if writing to log succeeds, false otherwise.
     */
	public function log_error($msg, $filename="Logger")
    {
        $this->prefix = "ERROR";
        return $this->log($msg, $filename);
	}

    /**
     * Writes a provided message to the logfile with a prefix indicating it's a debug message.
     * @param $msg string Message to be recorded.
     * @return bool True if writing to log succeeds, false otherwise.
     */
	public function log_debug($msg, $filename="Logger")
    {

        if (LOG_LEVEL != "DEBUG"){
            return true;
        } else {
            $this->prefix = "DEBUG";
            return $this->log($msg, $filename);
        }

	}

    /**
     * Returns a handle to a Logger instance, creates a new one if one doesn't already exists.
     * @return Logger
     */
	public static function getInstance()
    {
		// Check is $_instance has been set
        if(!isset(self::$instance)) 
        {
            // Creates sets object to instance
            self::$instance = new Logger();
        }

        return self::$instance;
	}
}

