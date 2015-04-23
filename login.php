<?php 
// include the configs / constants for the database connection
require_once("config/db.php");
// load the login class
require_once("classes/Login.php");
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();
// ... ask if we are logged in here:
//var_dump($login->isUserLoggedIn()); exit;
if ($login->isUserLoggedIn() == true) {
    if($_SESSION['uid'] == '4') {
        header('Location:pnl_cons.php');
    } else {
        header('Location:index.php');
    }
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    header('Location:login.html');
}
