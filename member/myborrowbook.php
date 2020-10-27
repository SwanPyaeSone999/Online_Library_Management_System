<?php 
    session_start();

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
  <link rel="stylesheet" href="css/myborrowbook.css">
  <link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>
  <!-- nav start -->
  <img src="images/navphoto2.jpeg" alt="" width="100%">
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
          <a class="nav-link" href="whoarewe.php">Who Are We</a>
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

 <section class="tables mt-4 d-flex justify-content-center">
        <div class="row d-flex justify-content-center">
          
            <h3 class="text-center text-muted mt-5">My Issue Book Info</h3>
                <table class="table table-bordered bg-light mt-3 table-hover tabel-dark ">
                  <thead class="text-muted">
                    <tr>
                      <th>Name</th>
                      <th>Book_name</th>
                      <th>Book_Issue Date</th>
                      <th>Date Will Return</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                        $sql = "SELECT issues.book_id , issues.member_id , issues.book_issue_date , members.member_name,
                        books.book_name FROM issues 
                        LEFT OUTER JOIN members
                        ON members.member_id = issues.member_id
                        LEFT OUTER JOIN books
                        ON books.book_id = issues.book_id where member_name = '$_SESSION[username]' AND book_return_date= '' ";

                        $res = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($res)) 
                      {  ?>
                        <tr>
                          <td><?php  echo $row['member_name'];?></td>
                          <td><?php  echo $row['book_name'];?></td>
                          <td><?php  echo $row['book_issue_date'];?></td>
                          <?php 
                            $date1 = $row['book_issue_date'];
                            // echo "$date1";
                            
                            $add7days =  date("d-m-Y",strtotime($date1.'+7days'));
                           ?>
                            <td  class="text-danger"><?php echo $add7days ; ?></td>
                          
                        </tr>
                          
                    <?php } ?>
                    

                  </tbody>
                  
                </table>
            </div>
          </div>
      </section>


  <script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
  <script src="library/bootstrap/popper.min.js"></script>
  <script src="library/bootstrap/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>