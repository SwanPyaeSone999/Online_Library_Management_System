<?php 
	require_once 'config/dbconnect.php';
	$errors = array('member_name' => '' ,'member_password' => '' , 'member_email' => '','member_phone' => '');
	$member_name = "";
	$member_password = "";
	$member_email = "";
	$member_phone = "";

	if (isset($_POST['btn_create'])) {
		if (empty($_POST['member_name'])) {
			$errors['member_name'] = "your name cannot be empty!";
		}
		else{
			$member_name = $_POST['member_name'];
			if (!preg_match('/^[a-zA-Z]/', $member_name)) {
				$errors['member_name'] = "user name must be valid!";
			}
		}
		if (empty($_POST['member_password'])) {
			$errors['member_password'] = "your password cannot be empty!";
		}
		else{
			$member_password = $_POST['member_password'];
			if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,20}$/',$member_password)) {
				$errors['member_password'] = "your password length must be 8 or above!";
			}
		}
		if (empty($_POST['member_email'])) {
			$errors['member_email'] = "email cannot be empty!";
		}else{
			$member_email = $_POST['member_email'];
			if (!filter_var($member_email,FILTER_VALIDATE_EMAIL)) {
				$errors['member_email'] = "your email must be valid!";
			}
		}
		if (empty($_POST['member_phone'])) {
			$errors['member_phone'] = "phonenumber  cannot be empty!";
		}
		if (array_filter($errors)) {
			
		}
		else{
						$member_name = mysqli_real_escape_string($conn,$_POST['member_name']);
						$member_password = 	mysqli_real_escape_string($conn,$_POST['member_password']);				
						$member_email = mysqli_real_escape_string($conn,$_POST['member_email']);
						$member_phone = mysqli_real_escape_string($conn,$_POST['member_phone']);

						$sql = "INSERT INTO `members`( `member_name`, `member_password`, `member_email`, `member_phone`, `approve`) VALUES ('$member_name','$member_password','$member_email','$member_phone ','yes')";

						if (mysqli_query($conn,$sql)) {
								echo "<script>alert('Register successfully!');</script>";
						}else{
								echo "Udate faiel".mysqli_error($conn);
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
	<link rel="stylesheet" href="css/register.css">
	<link rel="shortcut icon" href="images/booklogo.png">
</head>
<body>
	<div class="container font-tit">
		<form action="" method="post">
			<h2>Register</h2>
			<div class="input-group">
				<!-- <label for="">Your Name</label> -->
				<input type="text" name="member_name"  placeholder="User Name"  value="<?= $member_name ?>">
				<div class="text-danger font-10 font-lemon mt-1">
					<?= 
						$errors['member_name'];
					 ?>
				</div>
			</div>
			<div class="input-group">
				<!-- <label for="">Your Password</label> -->
				<input type="password" name="member_password"    placeholder="User Password" value="<?= $member_password; ?>">
				<div class="text-danger font-10 font-lemon mt-1">
					<?= 
						 $errors['member_password'];
					 ?>
				</div>
			</div>
			<div class="input-group">
				<!-- <label for="">Email</label> -->
				<input type="text" name="member_email"  placeholder="User Email" value="<?= $member_email; ?>">
				<div class="text-danger font-10 font-lemon mt-1">
					<?=
						$errors['member_email']; 
					?>
				</div>
			</div>
			<div class="input-group">
				<!-- <label for="">Password</label> -->
				<input type="text" name="member_phone" placeholder="User Phone" value="<?= $member_phone; ?>">
				<div class="text-danger font-10 font-lemon mt-1">
					<?=
					 	$errors['member_phone'];
					?>
				</div>
			</div>
			<div class="input-group mt-5">				
				<input  type="submit" value="Create Account" name="btn_create">
			</div>			
			<div class="close">
				<span>
					<a href="login.php">
					&times;
					</a>
				</span>
			</div>
		</form>
	</div>

	
	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>



