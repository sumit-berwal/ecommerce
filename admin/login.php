<?php
require_once('../include/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="limiter" >
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">

			<div class="wrap-login100">
				<form method="post" action=""  class="login100-form validate-form" >
					<div class="login100-form-avatar">
						<img src="images/My_Profile_Photo.jpg" alt="Profile image">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						My Project
					</span>

				 	 <?php echo check_message(); ?> 
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text"  name="user_email"  placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="user_pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button  type="submit" name="btnLogin"  class="login100-form-btn">
							Login
						</button>
					</div>
 
				</form>
			</div>
		</div>
	</div> 

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

<?php
if(isset($_POST['btnLogin'])){
    $email = trim($_POST['user_email']);
    $pass = trim($_POST['user_pass']);
    $h_pass = sha1($pass);

    if($email ==  '' || $h_pass == ''){
        message('Invalid username and password!', 'error');
        header('location: login.php');
    }else{
        $user = new User();
        $result = $user::userAuthentication($email, $h_pass);
		// echo $result; exit;
        if($result == true){
            message("You logon as ".$_SESSION['U_ROLE'].".","success");
            if($_SESSION['U_ROLE']== 'Administrator'){
				// echo $_SESSION['USERID']; 
				// echo $_SESSION['U_NAME'];
				// echo $_SESSION['U_USERNAME'];exit;
                header('location: ../admin/index.php');
            }else{
                redirect('location: ../admin/login.php');
            }
        }else{
            message("Account does not exist! Please contact Administrator.", "error");
             header('location: ../admin/login.php'); 
          }
    }
}
?>