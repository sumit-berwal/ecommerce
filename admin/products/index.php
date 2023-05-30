<?php
include_once('../../include/initialize.php');
if(empty($_SESSION['USERID'])){
    header("location: ../login.php");
}
$view = (isset($_GET['view']) && $_GET['view'] !== '') ? $_GET['view'] : '';

$header = $view;
$title = "Products";
switch ($view){
    case 'list':
        $content = "list.php";
        break;
    case 'add':
        $content = "add.php";
        break;
    case 'edit':
        $content = "edit.php";
        break;
    case 'view':
        $content = "view.php";
        break;
    default:
        $content = "list.php";    
}

require_once('../theme/templates.php');
echo "this is products/ index file is here";