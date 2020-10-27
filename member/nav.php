


  <!-- nav start -->    
  <img src="images/navphoto2.jpeg" width="100%" alt="">
  <nav class="navbar navbar-expand-lg navbar-light font-lemon bg-white" style="letter-spacing: 2px;">
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
