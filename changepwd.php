<?php 
					require_once 'config/dbconnect.php';
	$errors = array('member_name' => '' ,'member_existPwd' => '' , 'member_changePwd' => '','member_confirmPwd' => '');
	$member_name = "";
	$member_existPwd = "";
	$member_changePwd = "";
	$member_confirmPwd = "";

	if (isset($_POST['btn_forgot'])) {
		if (empty($_POST['member_name'])) {
			$errors['member_name'] = "your name cannot be empty!";
		}
		else{
			$member_name = $_POST['member_name'];
			if (!preg_match('/^[a-zA-Z]/', $member_name)) {
				$errors['member_name'] = "user name must be valid!";
			}
		}
		if (empty($_POST['member_existPwd'])) {
			$errors['member_existPwd'] = "your password cannot be empty!";
		}
		else{
			$member_existPwd = $_POST['member_existPwd'];
			if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,20}$/',$member_existPwd)) {
				$errors['member_existPwd'] = "your password length must be 8 or above!";
			}
		}
		if (empty($_POST['member_changePwd'])) {
			$errors['member_changePwd'] = "your password cannot be empty!";
		}else{
			$member_changePwd = $_POST['member_changePwd'];
			if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,20}$/',$member_changePwd)) {
				$errors['member_changePwd'] = "your password length must be 8 or above!";
			}
		}
		if (empty($_POST['member_confirmPwd'])) {
			$errors['member_confirmPwd'] = "confirm Password  cannot be empty!";
		}
		if (array_filter($errors)) {
			
		}
		else{
					$member_name = mysqli_real_escape_string($conn,$_POST['member_name']);
					$member_existPwd = mysqli_real_escape_string($conn,$_POST['member_existPwd']);						
					$member_changePwd = mysqli_real_escape_string($conn,$_POST['member_changePwd']);
					$member_confirmPwd = mysqli_real_escape_string($conn,$_POST['member_confirmPwd']);

					$result = mysqli_query($conn,"SELECT  * FROM members WHERE member_name='$member_name'");
			  		$row = mysqli_fetch_assoc($result);
			  		$password = $row['member_password'];
			  		if ($_POST['member_existPwd'] == $row['member_password'] ) {
			  			
			  		}else{
			  			$errors['member_confirmPwd'] = "Password does not exit!";
			  		}
			  		$member_changePwd = $_POST['member_changePwd'];
			  		$member_confirmPwd = $_POST['member_confirmPwd'];
			  		if ($member_changePwd ==  $member_confirmPwd){
			  				if (mysqli_query($conn,"UPDATE members SET member_password='$member_changePwd' where member_name ='$member_name'")) {
			  			 	echo "<script>alert('Register successfully!');</script>";
			  			 } else {
	 			 				echo "Update faile.".mysqli_error($conn);
	   				 }
			  		}else{
			  			$errors['member_confirmPwd'] = "Passwords do not match";
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
	<link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="images/booklogo.png">
</head>
<body>
	<div class="container font-tit">
		<form action="" method="post">
			<h2>Change Password</h2>
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
				<input type="text" name="member_existPwd"    placeholder="Existing Password" value="<?= $member_existPwd; ?>">
				<div class="text-danger font-10 font-lemon mt-1">
					<?= 
						 $errors['member_existPwd'];
					 ?>
				</div>
			</div>
			<div class="input-group">
				<!-- <label for="">Email</label> -->
				<input type="text" name="member_changePwd"  placeholder="Change Password" value="<?= $member_changePwd; ?>">
				<div class="text-danger font-10 font-lemon mt-1">
					<?=
						$errors['member_changePwd']; 
					?>
				</div>
			</div>
			<div class="input-group">
				<!-- <label for="">Password</label> -->
				<input type="text" name="member_confirmPwd" placeholder="Confirm Password" value="<?= $member_confirmPwd; ?>">
				<div class="text-danger font-10 font-lemon mt-1">
					<?=
					 	$errors['member_confirmPwd'];
					?>
				</div>
			</div>
			<div class="input-group">				
				<input  type="submit" value="Change Password" name="btn_forgot">
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

