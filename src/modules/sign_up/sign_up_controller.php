<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/9/18
 * Time: 12:38 AM
 */

if(isset($_POST['submit'])){
    header("Location: sign_up_view.php");
    exit();
}else{
    header("Location: sign_up_model.php");
    exit();
}