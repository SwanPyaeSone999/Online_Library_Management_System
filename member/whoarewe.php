<div  hidden="">y</div><!DOCTYPE html>
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
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="css/whoarewe.css">
  <link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>
  
  <!-- nav start -->
  <img src="images/navphoto2.jpeg" width="100%" alt="">
  <nav class="navbar navbar-expand-lg navbar-light font-lemon bg-white" style="letter-spacing: 2px;">
    <a class="navbar-brand" href="#">
      <img src="images/booklogo.png" class="ml-2" width="50" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">      
        
        <li class="nav-item active mr-5 ">
          <a class="nav-link" href="header.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mr-5 ">
          <a class="nav-link" href="#">Who Are We</a>
        </li>      
        <li class="nav-item dropdown mr-5">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Book Category
          </a>
          <div class="dropdown-menu text-uppercase" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="Adventure.php">Adventure</a>
           
            <a class="dropdown-item" href="Child.php">Children</a>
            
            <a class="dropdown-item" href="Comedy.php">Comedy</a>
            
            <a href="Mystery.php" class="dropdown-item">Mystery</a>
           
            <a class="dropdown-item" href="Romance.php">Romance</a>

            <a href="Technology.php" class="dropdown-item">Technology</a>
          </div>
        </li>          
           <ol class="nav-item " data-toggle="modal" data-target="#sign-out"><a href="#" class="nav-link">
                  <i class="fas fa-sign-out-alt text-danger fa-lg"></i>
            </a></ol>
      </div>
  </nav>
  <!-- nav end -->
   <!-- modal-dialog start-->
   <div class="modal font-lemon" id="sign-out">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"> 
            <h5>Want To Log Out ?</h5>    
            <button class="close" type="button" data-dismiss="modal">&times;</button>       
          </div>
          <div class="modal-footer">               
            <a href="../index.php">
              <button class="btn btn-outline-danger">Log Out</button>
            </a>         
          </div>
        </div>
      </div>
   </div>
  <!-- modal-dialog end -->
  <h1 class="font-50 text-center text-uppercase font-tit font-weight-bold mt-2 border-bottom py-3">our team members</h1>
  <div class="swiper-container">
    <div class="swiper-wrapper mt-1 mb-3">
      <div class="swiper-slide" >
        <div class="imgBx">
          <img src="images/admin1.jpeg" alt="">         
        </div>
        <div class="details">
          <h3 class="text-dark font-tit font-30">Swan Pyae Sone<br><span>ADMIN( Coding )</span></h3>
        </div>
      </div>
      <div class="swiper-slide" >
        <div class="imgBx">
          <img src="images/admin4.jpeg" alt="">         
        </div>
        <div class="details">
          <h3 class="text-dark font-tit font-30">Khant Phone<br><span>USER( Coding )</span></h3>
        </div>
      </div>
      <div class="swiper-slide" >
        <div class="imgBx">
          <img src="images/admin2.jpeg" alt="">         
        </div>
        <div class="details">
          <h3 class="text-dark font-tit font-30">Thiddhi Swe<br><span>Debugging and assistant</span></h3>
        </div>
      </div>
      <div class="swiper-slide" >
        <div class="imgBx">
          <img src="images/admin3.jpeg" alt="">         
        </div>
        <div class="details">
          <h3 class="text-dark font-tit font-30">Wai Yan Htet<br><span>Debugging and assistant</span></h3>
        </div>
      </div>
      
    </div>
    <!-- Add Pagination -->
    <!-- <div class="swiper-pagination"></div> -->
  </div>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 80,
        stretch: 0,
        depth: 500,
        modifier: 1,
        slideShadows: true,
      },
      
      autoplay: {
        delay:1000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>



  <script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
  <script src="library/bootstrap/popper.min.js"></script>
  <script src="library/bootstrap/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
<?php 
    require_once 'footer4header.php';
 ?>  
