<?php
	require_once 'config/dbconnect.php'; 	
	session_start();
	$errors = array('user_name' => '','user_password' => '' ,'check_login' => '');
	$user_name = "";
	$user_password = "";
	if (isset($_POST['btn_login'])) {
		//check user name is empty or not
 		if (empty($_POST['user_name'])) {
 			$errors['user_name'] = "user name cannot be empty!";
 		}
 		else{
 			$user_name = $_POST['user_name'];
 			// //check user name is valid or not
 			// if (!preg_match('/^[a-zA-Z\s]/', $user_name)) {
 			// 	$errors['user_name'] = "user name must be valid!";
 			// }
 		}
 		if (empty($_POST['user_password'])) {
 		//check user password is empty or not
 			
 			$errors['user_password'] = "user password cannot be empty!";
 		}
 		else{
 			$user_password = $_POST['user_password'];
 			//check user password is valid or not
 			// if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,20}$/',$user_password)) {
 			// 	$errors['user_password'] = "user password length must be 8 or above!";
 			// }
 		}
 		if (array_filter($errors)) {
 			
 		}
 		else{
 				if ($_POST['user_name'] == "admin" &&  $_POST['user_password'] == "Admin123456" ) {
 					$_SESSION['username'] = $_POST['user_name'];
 					header("location: Admin/index.php");
 				}else{
 					$errors['check_login'] = "Invalid user name and password";
 					
 				}
 					$_SESSION['username'] = $_POST['user_name'];
 						$count = 0;
            				 $sql = "select * from members where member_name='$_POST[user_name]' && 
            				 		member_password='$_POST[user_password]' && approve ='yes'";
           						 $res = mysqli_query($conn,$sql);
            		 				$count = mysqli_num_rows($res);
            						if ($count == 0) {
            							$errors['check_login'] = "Invalid user name and password";
            						}else{
            							$sql = "UPDATE `members` SET `modified_at` = CURRENT_TIMESTAMP where member_name='$_POST[user_name]'";
            							 if (!mysqli_query($conn,$sql)) {
            							 		echo "Update failed.".mysqli_error($conn);
            							 }
            							header("location: member/header.php");
            						}
 		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Library Management System</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/login.css">
	 <link rel="shortcut icon" href= "booklogo.png">

</head>
<body>
	<div class="container font-lemon">
		<form action="" method="post">
			<h2>Login</h2>			
			<div class="input-group">											
				<input type="text" name="user_name" autocomplete="on" placeholder="USER NAME"value="<?php echo $user_name ?>">
				<div class="text-danger font-lemon font-12 mt-2 "><?php echo $errors['user_name'] ?></div>
			</div>		

			<div class="input-group">											
				<input type="password" id="password-field" name="user_password" placeholder="USER PASSWORD" value="<?php echo $user_password ?>">
				<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				<div class="text-danger font-lemon font-12 mt-2 "><?php echo $errors['user_password']; ?></div>
				<div class="text-danger font-lemon font-12 mt-2"><?php echo $errors['check_login']; ?></div>
			</div>
			<div class="input-group mt-4 mb-4">				
				<input type="submit" value="LogIn" name="btn_login" >
			</div>			
			<a href="register.php" class="registerEdit ml-5">Create Account</a>	
			<a href="index.php" class="close">&times;</a>
			
		</form>	
		<div class="d-none">
			<img src="member/images/signin-image.jpg" alt="" >	
		</div>
	</div>
	
	
			
	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>

</body>
</html>
<script>
	$(".toggle-password").click(function () {
		
	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
	if (input.attr("type") == "password"){
		input.attr("type","text");
	}else{
		input.attr("type","password");
	}
	});
</script>






