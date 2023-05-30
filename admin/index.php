<?php
require_once('../include/initialize.php');
// this is for authentication user loggin or not
admin_confirm_logged_in();

$content = 'home.php';

$view = (isset($_GET['page']) && $_GET['page'] !== '') ? $_GET['page'] : '';
switch ($view){
    case '1' :
        $title = "Products";
        $content = "products/";
        break;
    default:
        $title = "Products";
        header('location: products/');
}
echo "this is index file here";




require_once('./theme/templates.php');
?>