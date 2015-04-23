<?php
session_start();
//print_r($_SESSION); exit;
?>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Financial App</title>
    <!-- GLOBAL STYLES -->
    <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- PAGE LEVEL PLUGIN STYLES -->
    <!-- THEME STYLES -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">
    <!-- THEME DEMO STYLES -->
    <link href="css/demo.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
       <?php
// include the configs / constants for the database connection
require_once("config/db.php");
require_once("classes/kpi.php");
require_once("classes/Heads.php");
require_once("classes/Assumption.php");
include("views/dashboard.php");