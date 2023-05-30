<?php
include_once('../../include/initialize.php');

$action = (isset($_GET['action']) && $_GET['action'] !== '') ? $_GET['action'] : '';

switch ($action){
    case 'add':
        doInsert();
        break;
    case 'edit':
        doEdit();
        break;
    case 'delete':
        doDelete();
        break;
    case 'photos':
        doUpdateImage();
        break;
    case 'banner':
        setBanner();
        break;
    case 'discount':
        setDiscount();
        break;
}

function doInsert(){
    if(isset($_POST['save'])){
        $errorfile = $_FILES['image']['error'];
        $filetype =  $_FILES['image']['type'];
        $filetemp =  $_FILES['image']['tmp_name'];
        $filename =  $_FILES['image']['name'];
        $location = 'uploaded_photos/'. $filename;

        if($errorfile > 0){
            message('No image selected!', 'error');
            header('location: index.php?view=add');
        }else{
            $file = $_FILES['image']['tmp_name'];
            $image = addslashes( file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);
            if($image_size==false || $filetype== 'video/wmv'){
                //if it is not an image than redirect back
                message('Uploaded file is not an image!', 'error');
                header("location: index.php?view=add");
            }else{
                //upload the file
                move_uploaded_file($filetemp, $location);
                if($_POST['PRODESC'] == '' || $_POST['PROPRICE'] == ''){
                    // $messgestatus = false;
                    message('All fields are required!', 'error');
                    header("location: index.php?view=add");
                }else{
                    $autonumber = New Autonumber();
                    $res = $autonumber->set_autonumber('PROID');
                }
            }

        }
    }
}