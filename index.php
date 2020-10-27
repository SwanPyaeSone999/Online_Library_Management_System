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
	<link rel="stylesheet" href="css/index.css">
	<link rel="shortcut icon" href= "booklogo.png">
</head>
<body>
	
  	<!-- carousel section start -->
		 <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
		   <ol class="carousel-indicators">
		    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>

		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active" data-interval="1000">
		      <img class="d-block w-100" src="member/images/carouseltemplate4.jpeg" style="height:72vh;" alt="First slide">
          <div class="carousel-caption mb-5">
            <h2 class="font-tit font-50 font-weight-bold">Reading can change your mind</h2>            
          </div>
		    </div>
		    <div class="carousel-item "  data-interval="1000">
		      <img class="d-block w-100" src="member/images/carouseltemplate2.jpeg" style="height:72vh" alt="Second slide">          
          <div class="carousel-caption mb-5">
            <h2 class="font-tit font-50 font-weight-bold">The more that you read,<br>the more you will know</h2>

          </div>
		    </div>
        <div class="carousel-item" data-interval="1000">
          <img class="d-block w-100" src="member/images/carouseltemplate5.jpeg" style="height:72vh "  alt="Second slide">          
          <div class="carousel-caption mb-5" >
            <h2 class="font-tit font-50 font-weight-bold">Books are uniquely portable magic</h2>
                    
          </div>
        </div>  
         <div class="carousel-item" data-interval="1000">
          <img class="d-block w-100" src="member/images/carouseltemplate6.jpeg" style="height:72vh" alt="Second slide">          
          <div class="carousel-caption mb-5" >
            <h2 class="font-tit font-50 font-weight-bold">Think before you speak,<br>
                                                              Think before you think</h2>
                    
          </div>
        </div>
		    <div class="carousel-item" data-interval="1000">
		      <img class="d-block w-100" src="member/images/carouseltemplate3.jpeg" style="height:72vh" alt="Third slide">
          <div class="carousel-caption mb-5" >
            <h2 class="font-tit font-50 font-weight-bold">Reading brings us unknown friends</h2>            
          </div>
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
  	<!-- carousel section end -->
  	<!-- web info section start -->
  	<section id="info">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<h2 class="font-lemon font-50 text-dark ml-5 py-4 font-weight-bold">Welcome from our LIBRARY</h2>
					<p class="font-tit font-22 mr-4 font-18">
					Now <span class="font-30 font-weight-bold"> YOU </span> can read whatever you wants.<br>
					You need to have an <span class="font-30 font-weight-bold"> ACCOUNT</span> to borrow 
					<span class="font-30 font-weight-bold">BOOKS</span>.<br> 
					Click the <span class="font-30 font-weight-bold"> GET STARTED </span> to create an Account.<br> 
					</p>
					<a href="login.php" class="font-tit ">
						<button class="font-weight-bold" style="letter-spacing: 1px">Get Started</button>
					</a>
				</div>
				<div class="col-md-6 d-none">
					<img src="member/images/indexTemplate2.jpeg"  class="d-none">
				</div>
			</div> 
		</div>
  	</section>
  	<!-- web info section end -->
  	<section id="news"> 
  		<h2 class="font-lemon font-weight-bold font-30 text-uppercase border-bottom ml-3 mt-3 py-2">Top 6 most borrowed books of the week</h2>
  	<div class="container-fluid mt-3">       
         <div class="row"> 
            <?php 
                $sql = "select * from books order by book_borrowed_times desc limit 6";
                $result = mysqli_query($conn,$sql);
                $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

             ?>
             <?php 
                foreach($rows as $row){
                  ?>
               
           <div class="col-md-2 col-sm-6">        
              <img src="Admin/<?= $row['book_img']; ?>" class="img-fluid img-fluid d-block mx-auto">
              </a>
              <h3 class="font-tit font-16 mt-2 text-uppercase text-center">
                <b><?= $row['book_name']; ?></b>            
              </h3>
              <p class="text-center">
                Author : <span class="font-author"><?= $row['book_publisher']; ?></span>
              </p>
           </div>
           <?php }
              ?>        
        </div>
    </div>
      
  	</section>
  	<!-- footer section start -->
    <div class="container-fluid bg-white border-top py-2 d-flex justify-content-end font-tit font-16 font-weight-bold">
      <p>&copy;Copyrights <?php echo date("Y") ?>.All rights reserved.</p>
    </div>
	   <!-- footer section end -->
	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>