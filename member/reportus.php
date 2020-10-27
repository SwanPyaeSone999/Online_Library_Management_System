<?php 
  $errors = array('user_name' => '' , 'user_problem' => '' , 'user_date' => '');	
 if (isset($_POST['reportSubmit'])) {
 	if (empty($_POST['user_name'])) {
 		$errors['user_name'] = " * user name cannot be empty";
 	}if (empty($_POST['user_problem'])) {
 		$errors['user_problem'] = " * user problem cannot be empty";
 	}if (empty($_POST['user_date'])) {
 		$errors['user_date'] = " * user date cannot be empty";
 	}
 	if (array_filter($errors)) {
 		
 	}
 	else
 	{
 		echo "<script>alert('Your message has been sent!')</script>";
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
	<link rel="stylesheet" href="css/footer1.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light font-lemon bg-footer" style="letter-spacing: 2px;">
      <a class="navbar-brand" href="#">
        <img src="images/booklogo.png" class="ml-2" width="50" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">  
            <li class="nav-item  mr-5 ">
            <a class="nav-link" href="header.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mr-5 ">
            <a class="nav-link" href="whoarewe.php">Who Are We</a>
          </li> 
        </div>
    </nav>
	<h2 class="font-tit font-40 font-weight-bold text-uppercase text-center py-3">Report us</h2>
    <div class="d-flex justify-content-center">	
    <form action="" class="w-50" method="post">
			<div class="input-group mb-4">
				<div class="input-group-prepend">
					<span class="input-group-text">						
					<i class="fas fa-user"></i>
					</span>
				</div>
				<input type="text" name="user_name" placeholder="USER NAME" class="form-control " >	
				
		    </div>
		    <div class="text-danger font-lemon mb-3 font-12 text-uppercase">
					<?php echo $errors['user_name']; ?>
				</div>
		    <div class="input-group mb-4">
				<div class="input-group-prepend">
					<span class="input-group-text ">						
					<i class="fa fa-bug "></i>
					</span>
				</div>
				<textarea name="user_problem" placeholder="DESCRIBE YOUR PROBLEM" id="" class="form-control"></textarea>
		    </div>
		    <div class="text-danger font-lemon mb-3 font-12 text-uppercase">
				<?php echo $errors['user_problem']; ?>
			</div>
		    <input type="date" name= "user_date" class="form-control mb-4" placeholder="SELECT DATE">
		  <div class="text-danger font-lemon mb-4 font-12 text-uppercase">
		  	<?php echo $errors['user_date']; ?>
		  </div>
			<input type="submit" class="btn btn-outline-success w-50  d-block mx-auto " name= "reportSubmit" value="Submit" >
	</form>
    </div>	


	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>