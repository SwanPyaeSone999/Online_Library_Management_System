
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
	<link rel="stylesheet" href="css/book-category.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>
    <!-- nav start -->
  <?php require_once 'nav.php'; ?>
  <!-- modal-dialog end -->
   <div class="modal font-lemon" id="sign-out">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"> 
            <h5>Want To Log Out ?</h5>    
            <button class="close" type="button" data-dismiss="modal">&times;</button>       
          </div>
          <div class="modal-footer">               
            <a href="index.php">
              <button class="btn btn-outline-danger">Log Out</button>
            </a>         
          </div>
        </div>
      </div>
   </div>
  <!-- modal-dialog end -->
  <!-- adventure-books start -->
	        <div class="adventure-books mt-2 font-tit">
				   	<?php 
		          $sql = "SELECT book_category from books where book_category ='Technology' limit 1";
		          $result  = mysqli_query($conn,$sql);
		          $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
		          ?>		          	
		    <div class="container mt-3 bg-white bg-round"> 
		    <?php
		           foreach($rows as $row)
		           //while($row  = mysqli_fetch_assoc($result))
		            {     ?> 
					<h2 class="font-22 border-bottom font-lemon text-uppercase py-3 font-weight-bold" style="color:purple;">
			         <?= $row['book_category'] ?> 			
					</h2>
				 <?php } ?>	 
		          <?php 
		          $sql = "SELECT * from books where book_category ='Technology' and  flag = 'yes'  order by created_at desc";
		          $result  = mysqli_query($conn,$sql);
		          $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
		          ?>         
		      <div id="sss" class="row mt-3">

		         <?php foreach($rows as $row)
		          // while($row  = mysqli_fetch_assoc($result))
		            {     ?>  
		        <div class="col-md-3 col-sm-6 ">
		          <a href="books-info.php?id=<?php echo $row['book_id']; ?>">
		          <img src="../Admin/<?php echo $row['book_img']; ?>" class="img-fluid d-block mx-auto">
		          </a>
		          <h3 class="font-tit font-14 mt-2 text-uppercase text-center">
		            <b><?php echo $row['book_name']; ?></b>            
		          </h3>
		          <p class="text-center">
		            Author : <span class="font-author"><?php echo $row['book_publisher']; ?></span>
		          </p>
		        </div>
		         <?php }        
		       ?>
		     </div>
		   </div>
		     </div>
  <!-- adventure-books end -->

	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#sss div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>