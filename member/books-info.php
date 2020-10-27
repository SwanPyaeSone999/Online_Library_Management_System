<?php
	require_once 'config/dbconnect.php';
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
	<link rel="stylesheet" href="css/books-info.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>
	
 
    <!-- nav start -->
  <?php require_once 'nav.php'; ?>
  <!-- modal-dialog end -->
  <!-- books-info start -->
  <div class="books-info">
	  	<div class="container bg-white mt-3 bg-round py-2">
			<?php 
				$bookid = $_GET['id'];
				$sql = "SELECT * from books where book_id = $bookid ";
          $result  = mysqli_query($conn,$sql);
          $rows   = mysqli_fetch_all($result,MYSQLI_ASSOC);
          

			 ?>
	  		<div class="row mt-3">
	  			<?php 
	  				foreach($rows as $row) {
          // while($row  = mysqli_fetch_assoc($result)){
	  			 ?>
	  			<div class="col-md-4 ">	  				
	  				<img src="../Admin/<?= $row ['book_img'] ?>" class="img-fluid" alt="">
	  			</div>
	  			<div class="col-md-8  font-tit ">  				
	  				<h2 class="text-uppercase font-lemon font-25 font-weight-bold border-bottom mt-md-0 mt-sm-5 py-2">
	  					<?php echo $row['book_name'] ?></br>
	  				</h2>
	  				<p class="mt-4  font-16	">
	  					<span class="text-muted">Author : </span><span class="font-author"><b class="font-lemon"><?php echo $row['book_publisher']; ?></b></span>
	  				</p>		
	  				  <p class="font-16 ">
	  				  	<span class="text-muted">Book released date : </span><b class="text-success"><?= $row['book_published_date'] ?></b>
	  				  </p>					
	  					<span >
						<?php 
							echo $row['book_description'];
						 ?>
						</span>
						<p class="mt-3 text-dark font-weight-bold border-bottom">
	  					Book Reviews
	  					</p>
						<p class="mt-3 text-muted">
							<?= $row['book_footer']; ?>
						</p>
	  				</p>
	  				<p class="mt-2">
	  					<span class="text-muted">Book Category : </span><a href="<?php echo $row['book_category'].'.php'; ?>" class="text-primary"> <?= $row['book_category'] ?></a>
	  				</p>
	  				<p class="mt-2 font-12">
	  					<span class="text-muted font-18">Rating : </span> <span class="font-14"><b><sup><?= $row['book_rating'] ?></sup></b></span> 					
			  				<?php if ($row['book_rating']==1):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==1.5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star-half text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==2):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==3):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==3.5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star-half text-warning"></i>	  					 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==4):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==4.5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star-half text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i>
			  					<i class="fa fa-star text-warning"></i>
			  					<i class="fa fa-star text-warning"></i>
			  					<i class="fa fa-star text-warning"></i>

			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==5.5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star-half text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==6):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==6.5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star-half text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==7):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==7.5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star-half text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==8):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==8.5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star-half text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==9):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==9.5):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i>	  										
			  					<i class="fa fa-star-half text-warning"></i> 					
			  				  <?php endif; ?>
			  				<?php if ($row['book_rating']==10):
			  				?>
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  					<i class="fa fa-star text-warning"></i> 					
			  				  <?php endif; ?>			  								
	  				</p>
	  				<p>
	  					<span class="text-muted font-18">Borrowed time : </span> (<?= $row['book_borrowed_times'] ?> times )
	  				</p>

	  			</div>
	  			<?php  } ?>
	  		</div>
	  	</div>
  </div> 
  
  <!-- books-info end -->
  <!-- you-may-also-like-books start -->
  <div class="container mt-3  bg-white bg-round mb-4">
		  <div class="you-may-also-like-books ">
			  	<h2 class="  text-uppercase font-25 font-lemon border-bottom font-weight-bold py-3" style="color:#FF00FF;">You may also like</h2>		  	
			  	<?php 
			  	$sql = "SELECT * from books where book_category = '" .$row["book_category"] . "' and   flag = 'yes' limit 6 ";
			  	$result = mysqli_query($conn,$sql);
			  	$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
			    ?>	
				<div class="row mt-3">
			  	<?php foreach ($rows as $row) { ?>
			 		<div class="col-md-2 col-sm-6">
			          <a href="books-info.php?id=<?php echo $row['book_id']; ?>">
			          <img src="../Admin/<?php echo $row['book_img']; ?>" class="img-fluid d-block mx-auto">
			          </a>
			          <h3 class="font-tit font-16 mt-2 text-uppercase text-center">
			            <b><?php echo $row['book_name']; ?></b>            
			          </h3>
			          <p class="text-center">
			            Author : <span class="font-author"><?php echo $row['book_publisher']; ?></span>
			          </p>
			          <p class="text-center">
			          	<span class="text-muted">Rating : </span>
			          	<?= $row['book_rating'] ?>
			          </p>
			        </div>		  
					<?php 	} ?> 		  	 
			  </div>
  		  </div>
  </div>
  <!-- you-may-also-like-books end -->
  <!-- footer start -->
  <?php include_once 'footer4header.php'; ?>
  <!-- footer end -->
  	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>	

