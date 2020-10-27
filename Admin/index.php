<?php 		
		
		require_once 'config/dbconnect.php';
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">	
	<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>
		
		<?php require_once 'header.php'; ?>
	<section id="">
		<div class="row mt-5">
			<div class="col-lg-10 col-md-12 ml-auto">
				<div class="row ">
				<?php 
						$res = mysqli_query($conn,"select * from members ");
						$a = mysqli_num_rows($res);
						if ($row = mysqli_fetch_assoc($res)) { ?> 
				
						<div class="col-lg-3 col-sm-6 col-xs-12">
			                <div class="card-box bg-blue">
			                    <div class="inner">
			                        <h3> Members</h3>
			                        <h4><?php echo "$a"; ?></h4>
			                    </div>
			                    <div class="icon">
			                        <i class="fa fa-users" aria-hidden="true"></i>
			                    </div>
			                    <a href="member_info.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
			                </div>
			            </div>
				<?php  } ?>
				<?php 
						$res = mysqli_query($conn,"select * from books ");
						$a = mysqli_num_rows($res);
						if ($row = mysqli_fetch_assoc($res)) {
				?>
			            <div class="col-lg-3 col-sm-6 col-xs-12">
			                <div class="card-box bg-green">
			                    <div class="inner">
			                        <h3> Books </h3>
			                        <h4><?php echo "$a"; ?></h4>
			                    </div>
			                    <div class="icon">
			                        <i class="fa fa-book" aria-hidden="true"></i>
			                    </div>
			                    <a href="view_book.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
			                </div>
			            </div>
			     <?php } ?>
				<?php 
						$res = mysqli_query($conn,"select * from issues where book_return_date = ''  ");
						$a = mysqli_num_rows($res);
						if ($row = mysqli_fetch_assoc($res)) {
				?>
			            <div class="col-lg-3 col-sm-6 col-xs-12">
			                <div class="card-box bg-orange">
			                    <div class="inner">
			                        <h3> Return book </h3>
			                        <h4><?php  echo $a; ?></h4>
			                    </div>
			                    <div class="icon">
			                        <i class="fa fa-undo" aria-hidden="true"></i>
			                    </div>
			                    <a href="Return-Renew.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
			                </div>
						 </div>
				<?php } ?>
					<?php 
							$res = mysqli_query($conn,"select * from issues ");
							 $a = mysqli_num_rows($res);
							 if ($row = mysqli_fetch_assoc($res)) {
					?>	 
			            <div class="col-lg-3 col-sm-6 col-xs-12">
			                <div class="card-box bg-red">
			                    <div class="inner">
			                        <h3> Issues </h3>
			                        <h4><?php echo "$a"; ?></h4>
			                    </div>
			                    <div class="icon">
			                        <i class="fas fa-list"></i>
			                    </div>
			                    <a href="issue_list.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
			                </div>
			            </div>
			          <?php } ?>
			       </div>
			       
				
			       		<div class="row mt-3">
			       			<div class="col-md-12 mt-3 bg-dark ml-2 px-5">
								<div class="container mt-2">
  									<h2 class="text-white text-center">Best Borrow Books </h2>
             					
 									 <table class="table table-dark table-hover mb-5 ">
									    <thead>
									      <tr>
									        <th>Books Name</th>
									        <th>Borrow Times</th>
									        <th>Category</th>
									      </tr>
									    </thead>
									    <tbody>
									<?php 
             							$res = mysqli_query($conn,"SELECT * FROM `books`  ORDER by book_borrowed_times DESC limit 6");
							 			while ($row = mysqli_fetch_assoc($res)) {
             						?>
									      <tr>
									        <td><?php echo $row['book_name'] ?></td>
									        <td><?php echo $row['book_borrowed_times'] ?></td>
									        <td><?php echo $row['book_category'] ?></td>
									      </tr>
									 <?php } ?>    
									    </tbody>								
									  </table>						
								</div>
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
