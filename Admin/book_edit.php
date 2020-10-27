<?php 	

require_once 'config/dbconnect.php';


		$errors = array('book_name' => '' ,'book_img' => '','book_author' => '' , 'book_publisher' => '','book_published_date' => '',
			'book_category'	=> '', 'book_description' => '', 'book_footer' => '' , 'book_rating' => '','book_borrowed_times' =>'');

		if (isset($_POST['edit_book'])) {
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
		
		

						$target_dir = "images/";
						$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
						move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

	

		
		if (array_filter($errors)) {
 			
 		}
 		else{ 
 						$bookid = $_GET['id'];
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

						

						$sql = "UPDATE books SET book_name = '$book_name' ,  book_img = '$target_file', book_author= '$book_author',
								 book_publisher= '$book_publisher' ,  book_published_date= '$book_published_date' , 
								 book_category = '$book_category' ,  book_description= '$book_description' , 
								 book_footer = '$book_footer' , book_rating = '$book_rating' , 
								 book_borrowed_times= '$book_borrowed_times' WHERE book_id=$bookid ";

						if (mysqli_query($GLOBALS['conn'],$sql)) {
								echo "<script>alert(' Book Edit  successfully!');</script>";
						}else{
								echo "Update failed ".mysqli_error($conn);
						}		
				}
			}
	
	

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>bootstrap template</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">	
	<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/member_info.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>

	<?php require_once 'header.php'; ?>
	<?php 
			$bookid = $_GET['id'];
			$sql = "SELECT * from books where book_id = $bookid ";
          $result  = mysqli_query($conn,$sql);
          while($row  = mysqli_fetch_assoc($result)){		
	?>
		<section class=" mt-4 ">
			<div class="row">
				<div class="col-lg-10 col-md-9 ml-auto ml-5 ">
						<div class="add-book mt-4">
							<h3 class="text-center py-4 ">Edit Book</h3>	
				<form action="" method="post" enctype="multipart/form-data" class="bg-light">	
				<label for="" class="ml-4 mt-2"><b>Book Name</b></label>				
				<div class="input-group  py-2 px-4">

				<input type="text" name="book_name" placeholder="Book Name" class="form-control"
				 value="<?php echo $row['book_name'] ?>">
				<br>
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_name'] ?>
				</div>	
				<div class="input-group  py-3 px-4">
				<label for="" class="text-dark mr-4 mt-2"><b>Book Image</b></label>
				<input type="file" name="fileToUpload" placeholder="Book Image" class="" value="<?php echo $row['book_img'] ?>" 
				onchange="preview_image(event)">
				<img  name="img" src="<?php echo $row['book_img']?>" height="70" width="70" id="output_image"  value="<?php echo $row['book_img'] ?>">
							
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_img'] ?>
				</div>	
				<label for="" class="ml-4 mt-2"><b>Book Author</b></label>
				<div class="input-group  px-4">
				<input type="text" name="book_author" placeholder="Book Author" class="form-control" value="<?php echo $row['book_author'] ?>">
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_author'] ?>
				</div>
				<label for="" class="ml-4 mt-2"><b>Book Author</b></label>
				<div class="input-group  py- px-4">
				<input type="text" name="book_publisher" placeholder="Book Publisher" class="form-control" value="<?php echo $row['book_publisher'] ?>">
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_publisher'] ?>
				</div>
				<label for="" class="ml-4 mt-2"><b>Book Published Dater</b></label>
				<div class="input-group  py- px-4">
				<input type="text" name="book_published_date" placeholder="Book Published Date" class="form-control" value="<?php echo $row['book_published_date'] ?>">		
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_published_date'] ?>
				</div>
				<label for="" class="ml-4 mt-2"><b>Book Category</b></label>
				<div class="input-group  py- px-4">
					<select name="book_category" id="" class="form-control" >
							<option value="<?php echo $row['book_category'];?>"><?php echo $row['book_category'] ?></option>
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
				<label for="" class="ml-4 mt-2"><b>Book Description</b></label>				
				<div class="input-group  py- px-4">
				<input type="text" name="book_description" placeholder="Book Description" class="form-control" value="<?php echo $row['book_description'] ?>">			
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_description'] ?>
				</div>
				<label for="" class="ml-4 mt-2"><b>Book Footer</b></label>
				<div class="input-group  py- px-4">
				<input type="text" name="book_footer" placeholder="Book Footer" class="form-control" value="<?php echo $row['book_footer'] ?>">				
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_footer'] ?>
				</div>
				<label for="" class="ml-4 mt-2"><b>Book Rating</b></label>
				<div class="input-group  py- px-4">
				<input type="text" name="book_rating" placeholder="Book Rating" class="form-control" value="<?php echo $row['book_rating'] ?>">				
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_rating'] ?>
				</div>
				<label for="" class="ml-4 mt-2"><b>Book Borrowed Time</b></label>
				<div class="input-group  py- px-4">
				<input type="text" name="book_borrowed_times" placeholder="Book Borrowed Time" class="form-control" value="<?php echo $row['book_borrowed_times'] ?>">
				</div>
				<div class="text-danger ml-4 font-12">
					<?php echo $errors['book_borrowed_times'] ?>
				</div>
				
				<div class="input-group  pb-5 px-4 mt-3">
				<input type="submit" name="edit_book"  class="form-control btn btn-outline-info" value="Edit">
				</div>
				</form>
						</div>
				</div>
			</div>
		</section>
			
		<?php } ?>


	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>

	<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>
