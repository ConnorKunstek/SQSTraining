<?php
/**
 * AccountVerification class
 * @link https://code.tutsplus.com/tutorials/how-to-implement-email-verification-for-new-members--net-3824 Source for email verification design
 */

require_once(__DIR__.'/../config/config.php');
require_once ("Connector.php");
require_once ("Logger.php");

/**
 * Class to allow sending of a verification email to an email.
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 * @todo review all code
 */
class AccountVerification {

    private $email;
    private $logger;

    /**
     * Constructor that should be used.
     * @param string $id ID number of the user. 
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
        $this->logger = new Logger();
    }

    /**
     * 
     */
    public function sendVerification()
    {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $to = $this->email;
        $subject = "Verify your email address";
        $url = $this->createURL($this->email);
        $message = $this->createMessage($url);

        mail($to, $subject, $message, $headers);
        $this->logger->log("Email verification sent to ".$this->email);
    }

    public function sendVerification_TEST()
    {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $to = $this->email;
        $subject = "[TEST] Verify your email address";
        $url = $this->createURL($this->email);
        $message = $this->createMessage($url);

        echo '<h1>Account Verification Email</h1><hr>';
        echo '<p><b>to:</b> '.$to.'</p>';
        echo '<p><b>subject:</b> '.$subject.'</p>';
        echo '<p><b>headers:</b> '.$headers.'</p>';
        echo '<p><b>url:</b> '.$url.'</p>';
        
        echo '<p>Email preview will be populated below...</p><br>';
        echo $message;
    }

    /**
     * Creates the body of the email using mail compatible HMTL markup.
     * @param string $url verification url for the email
     * @return string Entire email message as string
     * @todo make email look prettier
     */
    private function createMessage($url){
        $msg = "<!DOCTYPE html><html><body>";
        $msg .= "<h2>Welcome to SQS Training!</h2>";
        $msg .= "<p>To finish setting up your account, we just need to make sure this email address is yours.</p>";
        $msg .= "<a href=\"".$url."\">Verify Email</a>";
        $msg .= "<p>Thanks,</p>";
        $msg .= "<p>The SQS Training Team</p>";
        $msg .= "</body></html>";

        return (string)$msg;
    }

    /**
     * Creates a unique url that is associated with the user via the database
     * @param string $email user's email address
     * @return string unique url that has been associated with the user
     * @todo add error handling for getting hash
     */
    private function createURL($email){
        $filename = $_SESSION['base_path']."/src/modules/verify/verify_controller.php"; // TODO: Figure out how to better define the URL handler than a hard-coded value.
        $hash = $this->getHash(); // getting the hash

        // TODO: Verify that the HTTP_POST server variable creates the right value for the url.
        return 'http://'.$_SERVER['HTTP_HOST'].'/'.$filename.'?email='.$email.'&hash='.$hash;
    }

    /**
     * Creates a unique hash that is also stored in the database
     * @return string 32 character hash
     */
    private function getHash(){
        $hash = md5( rand(0,1000) );
        $email = $this->email;

        # Store hash into database
        try {
            $base = Connector::getDatabase();
            $sql = "UPDATE user SET hash='$hash' WHERE email = '$email';";
            $stmt = $base->prepare($sql);
            $stmt->execute();
            $this->logger->log_debug("Added hash to user ".$this->email);
        } catch (Exception $e){
            $this->logger->log_error("Could not add hash to database. Exception: ".$e);
            return False;
        }

        return $hash;
    }
}

?>