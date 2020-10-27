	<?php 

			
			require_once 'config/dbconnect.php';

			$errors = array('member_name' => '');
			$member_name = "";
			if (isset($_POST['issue-book'])) {
			if (empty($_POST['book_id'])) {
				echo "<script>alert('Select a book to issue ');</script>";
			}else{

			$book_id = mysqli_real_escape_string($conn,$_POST['book_id']);
			$member_id = mysqli_real_escape_string($conn,$_POST['member_id']);
			$book_issue_date = mysqli_real_escape_string($conn,$_POST['book_issue_date']);

			$sql = "INSERT INTO issues VALUES('','$book_id','$member_id','$book_issue_date','','')";
							// set not available
			mysqli_query($conn,"UPDATE  books  set status = 'not available',book_borrowed_times=book_borrowed_times+1 
								where book_id='$book_id'");
			if (mysqli_query($conn,$sql)) {
			echo "<script>alert('Book issue  successfully!');</script>";
			}else{
			echo "Update failed".mysqli_error($conn);
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
		<link rel="stylesheet" href="js/selectstyle.css">
		<link rel="stylesheet" href="css/member_info.css">
		<link rel="shortcut icon" href= "images/booklogo.png">
	</head>
	<body>

			<?php require_once 'header.php'; ?>

	<section class="">
			<div class="row">
				<div class="col-lg-10 col-md-9 ml-auto ml-5">
					<h3 class="text-center text-muted mt-5">Issue Books</h3>

					<form action="" method="post" class="mt-4">
						<div class="row">
							<div class="col-md-6 ">
								<div class="d-flex ml-5">
									<select name="member_name" id="" class="form-control selectpicker mr-3 ">
										<option value="">Select Member</option>
										<?php 
											$sql = "SELECT * FROM `members` WHERE modified_at >= CURRENT_DATE();";
											$res = mysqli_query($conn,$sql);
											while ($row = mysqli_fetch_assoc($res)) {  ?>
											<option><?php echo $row['member_name']; ?></option>
										<?php 
										 } 
											?>
									</select>
										<button class="btn btn-secondary" name="search">Search</button>
										<div class="text-danger font-10 font-lemon mt-1">
												<?= 
													$errors['member_name'];
												 ?>
										</div>
								</div>																
							</div>
						</div>
					</form>
					<?php 
							if (isset($_POST['search'])) {
							if (empty($_POST['member_name'])) { ?>
								<script type="text/javascript">
									window.alert("Selet Member to issue");
								</script>
								
					<?php  	}
							else{

							$res  = mysqli_query($conn,"SELECT * from members where member_name = '$_POST[member_name]'");
							while($row = mysqli_fetch_assoc($res)){
							$member_name = $row['member_name'];
							$member_id = $row['member_id'];
					} ?>
							
					<div class="col-md-12 mt-5 slideup  bg-light mr-5" >
						<form method="post" class="">
	  						<div class="form-group"> 
	   							 <label for="name" class="py-2">Member Name</label>
	   							 <input type="text" class="form-control"  value="<?php echo $member_name; ?>">
	   							 <input type="text" hidden="" value="<?php echo $member_id;  ?>"  name="member_id">
	 						</div>
	  						<div class="form-group ">
	  							<label for="" class="py-2">Book Name</label>
	  							<select id="sss"   style="" placeholder="Select Book" size="7" 
	  								class="form-control" name="book_id">
									<?php 
									$sql = "SELECT * from books where status = 'available' and flag = 'yes' group by book_name asc ";
									$res = mysqli_query($conn,$sql);
									while ($row = mysqli_fetch_assoc($res)) {  ?>
									<option value="<?php echo $row['book_id'] ?>"><?php echo $row['book_name']; ?></option>
									<?php 
									} 
								 	?>	
								</select>
	   						</div>
	  						<div class="form-group">
	   							 	<label for="name"class="py-2">Issue Date</label>
	   							    <input type="text" class="form-control mb-5" id="name" readonly="" name="book_issue_date" value="<?php echo	date("d-m-Y"); ?>" >
	   						</div>
	   						<div class="form-group">
	   								 <input type="submit" name="issue-book" class="btn btn-outline-success mb-4 form-control">
	   						 </div>
						</form>
							<?php 	}				
							}
						 ?>
					</div>
			</div>
		</div>	
	</section>		




<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
<script src="library/bootstrap/popper.min.js"></script>
<script src="library/bootstrap/bootstrap.min.js"></script>
<script src="js/selectstyle.js"></script>
<script src="js/script.js"></script>

<!-- 	<script>
jQuery(document).ready(function($) {
	$('#sss').selectstyle({
		width  : 400,
		height : 300,
		theme  : 'light',
		onchange : function(val){}

	});


});
</script> -->


	</body>
	</html>

