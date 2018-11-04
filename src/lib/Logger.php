<?php

/**
 * A custom logger to be able to log messages while the application is running.
 * @author  Stephen Ritchie <stephen.ritchie@uky.edu>
 * @todo  Add constructor for defining a custom filename and directory
 * @version GIT: $Id$
 */
class Logger {

	/** @var string name of log file (with extension)*/
	private $filename = 'log.txt'; 

	/** @var string directory to where log file(s) reside */
	private $directory = '../../';

	/**
	 * Default Constructor
	 * @todo  check to see if backup location works
	 */
	public function __construct()
	{
		// Provide backup location if defined directory cannot be reached 
		if (!file_exists($this->directory.$this->filename)){
			$this->directory = '/';
		}
	}

	/**
	 * Appends the provided message to the defined log file.
	 * @param  string $msg Message to be logged.
	 */
	public function log($msg)
	{

		$date = date('Y-m-d H:i:s');
		$txt = $date." ".$msg;

		echo "in function";
		//$myfile = fopen("logs.txt", "a") or die("Unable to open file!");
		$myfile = file_put_contents($this->directory.$this->filename, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		//fclose($myfile);
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


?>

