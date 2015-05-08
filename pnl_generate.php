<?php
// include the configs / constants for the database connection
require_once("config/db.php");
require_once("classes/Login.php");
require_once("classes/kpi.php");
require_once("classes/Heads.php");
require_once("classes/Assumption.php");
require_once("classes/Pnl.php");
$login = new Login();
/* if ($_SESSION['uid'] == '4' && $_SESSION['branch_id'] == 'All Branches' && !empty($_REQUEST['id'])) {
  $_SESSION['branch_id'] = $_REQUEST['id'];
  } else if ($_SESSION['uid'] == '4' && $_SESSION['branch_id'] != 'All Branches' && !empty($_REQUEST['id'])) {
  $_SESSION['branch_id'] = $_REQUEST['id'];
  } */
if ($login->isUserLoggedIn() == true) {
    if (in_array('Super User', $_SESSION['role']) && !empty($_REQUEST['id'])) {
        $_SESSION['branch_id'] = $_REQUEST['id'];
    }
    $assumption = new Assumption();
    $pnl = new Pnl();
    if (isset($_POST['submit'])) {
        $pnl->savePnl();
        header('Location:pnl_report.php');
    }
    $kpi = new kpi();
    $heads = new Heads();
    include("views/pnl_generate.php");
} else {
    header('Location:login.html');
}

