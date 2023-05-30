<?php
session_start(); // first we have to start session to store the values in session

function logged_in(){
    return isset($_SESSION['USERID']);
}



function admin_confirm_logged_in(){
    if(!isset($_SESSION['USERID'])){?>
        <script type="text/javascript">
            window.location = (LIB_PATH.DS."login.php");
        </script>
  <?php  }
}

function message($msg="", $msgtype=""){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
        $_SESSION['msgtype'] = $msgtype;
    }else{
        return $messge;
    }
}


function check_message(){
    if(isset($_SESSION['message'])){
        if(isset($_SESSION['msgtype'])){
            if($_SESSION['msgtype']== 'info'){
                echo  '<label class="alert alert-info" style="width:100%;padding:5px;">'. $_SESSION['message'] . '</label>';
           
            }elseif($_SESSION['msgtype']=="error"){
              echo  '<label class="alert alert-danger" style="width:100%;padding:5px;">' . $_SESSION['message'] . '</label>';
                      
            }elseif($_SESSION['msgtype']=="success"){
              echo  '<label class="alert alert-success" style="width:100%;padding:5px;">' . $_SESSION['message'] . '</label>';
            } 
            unset($_SESSION['message']);
            unset($_SESSION['msgtype']);
            }
        }
    }
