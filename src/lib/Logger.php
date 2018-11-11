<?php

require_once(__DIR__.'/../config/config.php');

/**
 * Custom logger class that should work from any location in the repository.  Use the getInstance()
 * method (see example) to get a handler to the Logger.  This is done to keep the Logger as a 
 * singleton, which is helpful to ensure the log file path is alwyays able to be produced.
 * @example $myLogger = Logger::getInstance(); 
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 * @todo Create constructor to allow for a custom logging location to be defined
 */
class Logger
{
	private static $instance;
	private $logfile = "sqstraining.log";
	private $logpath;

	/**
	 * Default Constructor
	 */
	private function __construct(){
		$this->logpath = BASE_PATH."/log/".$this->logfile;
	}

	/**
	 * Logs a message to the defined log file.
	 * @param string $msg message to be logged
	 */
	public function log($msg){
		$date = date('Y-m-d H:i:s');
		$message = $date." ".$msg;

		if (!file_put_contents($this->logpath, $message.PHP_EOL , FILE_APPEND | LOCK_EX)){
			error_log("Log file could not be written to. path=".$this->logpath);
		}
	}

	/**
	 * Prefaces message with a warning indication before logging.
	 * @param type $msg warning message
	 * @todo Have warnings log to their own file as well.
	 */
	public function log_warning($msg){
		$this->log('[WARNING] '.$msg);
	}

	/**
	 * Prefaces message with an error indication before logging.
	 * @param type $msg error message
	 * @todo Have errors log to their own file as well.
	 */
	public function log_error($msg){
		$this->log('[ERROR] '.$msg);
	}

	/**
	 * Prefaces message with a debug indication before logging.
	 * @param type $msg debug message
	 * @todo Have debugs log to their own file as well.
	 */
	public function log_debug($msg){
		$this->log('[DEBUG] '.$msg);
	}

	/**
	 * Gets a handler to the logger class.  This allows the Logger to be passed
	 * around as a singleton.
	 * @return handler $instance Handler to a Logger instance.
	 */
	public static function getInstance(){
		// Check is $_instance has been set
        if(!isset(self::$instance)) 
        {
            // Creates sets object to instance
            self::$instance = new Logger();
        }

        return self::$instance;
	}
}

?>

