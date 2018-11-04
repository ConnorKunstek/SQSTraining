<?php

/**
 * A custom logger to be able to log messages while the application is running.
 * @author  Stephen Ritchie <stephen.ritchie@uky.edu>
 * @todo  Add constructor for defining a custom filename and directory
 * @version GIT: $Id$
 */
class Logger {

	/** @var string name of log file (with extension)*/
	private $filename = 'log'; 

	/** @var string directory to where log file(s) reside */
	private $directory = '../../log/';

	/**
	 * Default Constructor
	 * @todo  check to see if backup location works
	 */
	public function __construct()
	{
		//$this->log("Log file initialized.");
	}

	/**
	 * Appends the provided message to the defined log file.
	 * @param  string $msg Message to be logged.
	 */
	public function log($msg)
	{

		// Prefixing message with datetime stamp
		$date = date('Y-m-d H:i:s');
		$txt = $date." ".$msg;

		// Appending message to log file with EOL character, and locking file while being written to prevent 
		// writings at the same time.  I got this off the internet, but it seems to work lmao.
		$myfile = file_put_contents($this->directory.$this->filename, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
	}

	/**
	 * Prefixes message with error indentifier before logging
	 * @param  string $msg Message to be logged.
	 * @return void
	 */
	public function log_error($msg)
	{
		$this->log('[ERROR] '.$msg);
	}

	/**
	 * Prefixes message with warning indentifier before logging
	 * @param  string $msg Message to be logged.
	 * @return void
	 */
	public function log_warning($msg)
	{
		$this->log('[WARNING] '.$msg);
	}

	/**
	 * Prefixes message with debug indentifier before logging
	 * @param  string $msg Message to be logged.
	 * @return void
	 */
	public function log_debug($msg)
	{
		$this->log('[DEBUG] '.$msg);
	}

	/**
	 * Prefixes message with custom identifier before logging
	 * @param string $msg Message to be logged.
	 * @param string $header custom prefix 
	 * @return void
	 */
	public function log_custom($msg, $header)
	{
		$this->log('['.$header.'] '.$msg);
	}

}
$logger = new Logger();
$logger->log("another test");


?>

