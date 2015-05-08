<?php
// include the configs / constants for the database connection
require_once("config/db.php");
// load the KPI class
require_once("classes/kpi.php");
require_once("classes/Login.php");
require_once("classes/Heads.php");
require_once("classes/Assumption.php");
$login = new Login();
//var_dump($login->isUserLoggedIn()); exit;
if(in_array('Super User', $_SESSION['role'])  && !empty($_REQUEST['id'])  ) {
    $_SESSION['branch_id'] = $_REQUEST['id'];
}
//if ($_SESSION['uid'] == '4' && $_SESSION['branch_id'] == 'All Branches' && !empty($_REQUEST['id'])) {
//    $_SESSION['branch_id'] = $_REQUEST['id'];
//} else if ($_SESSION['uid'] == '4' && $_SESSION['branch_id'] != 'All Branches' && !empty($_REQUEST['id'])) {
//    $_SESSION['branch_id'] = $_REQUEST['id'];
//}
if ($login->isUserLoggedIn() == true) {
    $kpi = new kpi();
    $assumption = new Assumption();
    $heads = new Heads();
    if (isset($_POST['submit'])) {
        $heads->saveHeadValues();
        if($_REQUEST['year']) {
            $year_save = $_REQUEST['year'];
        }
        $kpi->savekpi();
        $assumption->saveAssumptions();
        header('Location: index.php');
    }
    include("views/editkpi.php");
} else {
    header('Location:login.html');
}


