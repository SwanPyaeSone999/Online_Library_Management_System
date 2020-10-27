<?php 

		// require_once 'bootstrap.html'; 
		
		require_once 'config/dbconnect.php';
		$errors = array('book_name' => '' ,'book_img' => '' ,'book_author' => '' , 'book_publisher' => '','book_published_date' => '',
			'book_category'	=> '', 'book_description' => '', 'book_footer' => '' , 'book_rating' => '','book_borrowed_times' =>'');

		if (isset($_POST['add_book'])) {	
		if (empty($_POST['book_name'])) {
			$errors['book_name'] =  "book name cannot be empty";
		}
		if (empty($_POST['book_author'])) {
			$errors['book_author'] =  "book author cannot be empty";
		}
		if (empty($_POST['book_publisher'])) {
			$errors['book_publisher'] =  "book publisher cannot be empty";
		}
		if (empty($_POST['book_published_date'])) {
			$errors['book_published_date'] =  "book published date cannot be empty";
		}
		if (empty($_POST['book_category'])) {
			$errors['book_category'] =  "book category cannot be empty";
		}
		if (empty($_POST['book_description'])) {
			$errors['book_description'] =  "bookdescription cannot be empty";
		}
		if (empty($_POST['book_footer'])) {
			$errors['book_footer'] = "book footer cannot be empty";
		}
		if (empty($_POST['book_rating'])) {
			$errors['book_rating'] = "book rating cannot be empty";
		}
		if (empty($_POST['book_borrowed_times'])) {
			$errors['book_borrowed_times'] = "book boorrwed times cannot be empty";
		}
		if ($_FILES['fileToUpload']['error'] > 0) {
		$errors['book_img'] =   "You must choose image.";

		}else{
			$target_dir = "book-image/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
			// $errors['book_img'] =   "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$errors['book_img'] =  "File is not an image.";
			$uploadOk = 0;
		}
			
		}

		
		if (array_filter($errors)) {
 			
 		}
 		else{ 
				$book_name = mysqli_real_escape_string($conn,$_POST['book_name']);
				$book_author = mysqli_real_escape_string($conn,$_POST['book_author']);
				$book_publisher = mysqli_real_escape_string($conn,$_POST['book_publisher']);				
				$book_published_date = mysqli_real_escape_string($conn,$_POST['book_published_date']);
				$book_category = mysqli_real_escape_string($conn,$_POST['book_category']);
				$book_description = mysqli_real_escape_string($conn,$_POST['book_description']);
				$book_footer = mysqli_real_escape_string($conn,$_POST['book_footer']);
				$book_rating= mysqli_real_escape_string($conn,$_POST['book_rating']);
				$book_borrowed_times = mysqli_real_escape_string($conn,$_POST['book_borrowed_times']);

				
				$target_dir = "images/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
						

				$sql = "INSERT INTO books(book_name,book_img,book_author,book_publisher,book_published_date,book_category,book_description,book_footer,book_rating,book_borrowed_times,status,flag) VALUES ('$book_name','$target_file','$book_author','$book_publisher','$book_published_date',
				'$book_category','$book_description','$book_footer','$book_rating','$book_borrowed_times','available','yes')";

				if (mysqli_query($GLOBALS['conn'],$sql)) {
						echo "<script>alert('New Book insert successfully!');</script>";
				}else{
						echo "Update failed ".mysqli_error($conn);
				}
			}
	}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">	
	<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/add_book.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>
	 <?php require_once 'header.php'; ?>
	<section class=" ">
		<div class="row">
			<div class="col-lg-10 col-md-9 ml-auto ml-5 ">
				<div class="add-book bg-light">
					<h3 class="text-center py-4 mt-5">Add Book</h3>	
						<form action="" method="post" enctype="multipart/form-data">					
						<div class="input-group  py-3 px-4">
						<input type="text" name="book_name" placeholder="Book Name" class="form-control" value="">
						<br>
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_name'] ?>
						</div>	
						<div class="input-group  py-3 px-4">
						<label for="" class="text-dark mr-4">Book Image</label>
						<div class="btn btn-success btn-rounded">
							 <input type="file" name="fileToUpload" id="fileToUpload">
						</div>
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_img'] ?>
						</div>	
						<div class="input-group  py-3 px-4">
						<input type="text" name="book_author" placeholder="Book Author" class="form-control" value="">
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_author'] ?>
						</div>
						<div class="input-group  py-3 px-4">
						<input type="text" name="book_publisher" placeholder="Book Publisher" class="form-control" value="">
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_publisher'] ?>
						</div>
						<div class="input-group  py-3 px-4">
						<input type="text" name="book_published_date" placeholder="Book Published Date" class="form-control" value="">		
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_published_date'] ?>
						</div>
						<div class="input-group  py-3 px-4">
						<select name="book_category" id="" class="form-control">
							<option value="">Select Category</option>
							<option value="Child">Child</option>
							<option value="Comedy">Comedy</option>
							<option value="Mystery">Mystery</option>
							<option value="Romance">Romance</option>
							<option value="Technology">Technology</option>
							<option value="Horror">Horror</option>
						</select>				
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_category'] ?>
						</div>				
						<div class="input-group  py-3 px-4">
						<textarea rows="4" type="text" name="book_description" placeholder="Book Description" class="form-control" value=""></textarea>			
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_description'] ?>
						</div>
						<div class="input-group  py-3 px-4">
						<textarea rows="4" type="text" name="book_footer" placeholder="Book Footer" class="form-control" value=""></textarea>				
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_footer'] ?>
						</div>
						<div class="input-group  py-3 px-4">
						<input type="text" name="book_rating" placeholder="Book Rating" class="form-control" value="">				
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_rating'] ?>
						</div>
						<div class="input-group  py-3 px-4">
						<input type="text" name="book_borrowed_times" placeholder="Book Borrowed Time" class="form-control" value="">
						</div>
						<div class="text-danger ml-4 font-12">
							<?php echo $errors['book_borrowed_times'] ?>
						</div>
						<div class="input-group  pb-5 px-4 mt-3">
						<input type="submit" name="add_book"  class="form-control btn btn-outline-success" value="Add">
						</div>
						</form>
				</div>
			</div>
		</div>
	</section>

	

			
<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
<script src="library/bootstrap/popper.min.js"></script>
<script src="library/bootstrap/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>

