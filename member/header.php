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
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>

  <!-- nav start -->    
  <img src="images/navphoto2.jpeg" width="100%" alt="">
  <nav class="navbar navbar-expand-lg navbar-light font-lemon bg-white " style="letter-spacing: 2px;">
    <a class="navbar-brand" href="#">
      <img src="images/booklogo.png" class="ml-2" width="50" alt="">
    </a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">      
        
        <li class="nav-item  mr-5 ">
          <a class="nav-link" href="header.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mr-5 ">
          <a class="nav-link" href="myborrowbook.php">My Borrowed Book</a>
        </li> 
        <li class="nav-item mr-5 ">
          <a class="nav-link" href="whoarewe.php">Who Are We</a>
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

             <a href="horror.php" class="dropdown-item">Horror</a>

          </div>
        </li>
        <ol class="nav-item mr-4">
          <div class="search">
            <a href="#" class="search-button">
              <i class="fas fa-search  "></i>
            </a>
             <input id="myInput" class="search-text" type="text" placeholder="Search">                        
          </div>
        </ol>          
         
           <div class="nav-item " data-toggle="modal" data-target="#sign-out">
            <a href="#" class="nav-link"><i class="fas fa-sign-out-alt text-danger fa-lg"></i>
          </div>  
      </div>
  </nav>  
  
   <div class="custom-sidebar d-flex flex-column">
     <a href="https://www.facebook.com/khant.phonekh" class="">
       <i class="fab fa-facebook mb-4 ml-3"></i>
     </a> 
     <a href="https://www.instagram.com/khant.phonekh/" class="">
       <i class="fab fa-instagram mb-4 ml-3"></i>
     </a>      
     <a href="https://twitter.com/Khant63901517" class="">
       <i class="fab fa-twitter mb-4 ml-3"></i>
     </a> 
     <a href="https://discord.com/channels/@me" class="">
      <i class="fab fa-discord mb-4 ml-3"></i>
     </a>
     <a href="https://www.reddit.com/user/Khant_Phone_27" class="">
      <i class="fab fa-reddit ml-3"></i>
     </a>
   </div>
   <div class="button-to-top">
      <button onclick="window.scrollTo(0, 0);" class="to-top" id="topBtn" title="Back to top">
      <i class="fas fa-arrow-circle-up fa-3x "></i>
      </button>
   </div>

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
 
  <!-- recommended-book start -->
  <div  class="container bg-white bg-round py-3 mt-3">
    <div class="recommended-book">
      <h2 class="font-22 font-weight-bold text-uppercase mt-2 border-bottom text-dark font-lemon pb-2">
      <i class="fa fa-star mr-2 text-warning"></i>
      Recommended books
      </h2>
          <?php 
            $sql = "SELECT * from books order by book_borrowed_times desc limit 15";
            $result  = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
            ?>
          <div class="swiper-container py-1">
                <div class="swiper-wrapper">
                  <?php foreach($rows as $row)
                  // while($row  = mysqli_fetch_assoc($result))
                    {     ?>  
                    <div class="swiper-slide">
                      <a href="books-info.php?id=<?= $row['book_id']; ?>" class="img-fluid">            
                      <img src="../Admin/<?= $row['book_img']; ?>" alt="">
                      </a>  
                    </div>
              <?php } ?>
                </div>
            <!-- Add Pagination -->
              <!-- <div class="swiper-pagination "></div> -->
          </div>
  </div>
  </div>

  <!-- recommended-book end -->
  <!-- recently-added start -->  
  <div  id="sss" class="recently-added mt-2 font-tit ">
    <div class="container mt-3 bg-white bg-round"> 
    <h2 class="font-lemon font-22 font-weight-bold text-uppercase py-3  border-bottom text-dark" ><i class="fa fa-book mr-2 text-dark" ></i>
    recently added books</h2>
    
        <?php 
          $sql = "SELECT * from books where   flag = 'yes' order by created_at desc ";
          $result  = mysqli_query($conn,$sql);
          $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
          ?>
      <div class="row mt-4">
          <?php foreach($rows as $row)
          // while($row  = mysqli_fetch_assoc($result))
            {     ?>  
               
        <div class="col-md-3 col-sm-6">          
            <a href="books-info.php?id=<?php echo $row['book_id']; ?>">
            <img src="../Admin/<?php echo $row['book_img']; ?>" class="img-fluid d-block mx-auto"></a>            
          <h3 class="font-tit font-16 mt-3 text-uppercase text-center">
            <b><?php echo $row['book_name']; ?></b>            
          </h3>
          <p class="text-center">
            Author : <span class="font-author"><?php echo $row['book_publisher']; ?></span>
          </p>
        </div>
         <?php }                 
       ?>
   </div>
    <div class="gradient mt-3"></div>
     </div>
  <!-- recently-added end -->
  
 
  <!-- footer start -->
   <?php 
      require_once 'footer4header.php';
    ?>
  <!-- footer end -->
  <script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
  <script src="library/bootstrap/popper.min.js"></script>
  <script src="library/bootstrap/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 7,
      centeredSlides: true,
      spaceBetween:160,
      grabCursor: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      loop:true,
       autoplay: {
        delay: 900,
        disableOnInteraction: false,
      },
    });
  </script>
  <script>
  const toTop = document.querySelector(".to-top");
  window.addEventListener("scroll",() => {

    if (window.pageYOffset > 100) {      
        toTop.classList.add("active");
    }else{
        toTop.classList.remove("active");
     }
    });
  </script>

 

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


