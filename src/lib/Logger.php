<?php
/**
 * Logger class
 */

/**
 * A custom logger to be able to log messages while the application is running.
 * @author  Stephen Ritchie <stephen.ritchie@uky.edu>
 * @todo  Add ability to set custom directory or log file name
 * @todo  Add support for logs to be generated for just warnings, just errors, etc
 * @version  GIT: $Id$
 */
class Logger {

	/** @var string name of log file (with extension)*/
	private $filename = 'log'; 

	/** @var string directory to where log file(s) reside */
	private $directory = '../../log/';

	/**
	 * Default Constructor
	 * @todo  Check to see if backup location will work.
	 */
	public function __construct()
	{
		$this->directory = $_SERVER["DOCUMENT_ROOT"]."/log/";
		//echo $this->directory;
		//echo $_SERVER['DOCUMENT_ROOT'];
	}

	/**
	 * Appends the provided message to the defined log file.
	 * @param  string $msg Message to be logged.
	 */
	public function log($msg)
	{
		// Prefixing message with datetime stamp
		$date = date('Y-m-d H:i:s');
		$txt = $date." ".$_SERVER["REMOTE_ADDR"]." ".$msg;

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


?>

