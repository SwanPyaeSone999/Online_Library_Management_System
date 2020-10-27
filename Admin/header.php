 <link rel="stylesheet" href="css/dashboard.css">
  <link rel="shortcut icon" href= "logo/booklogo.png">



      
      <!-- sidebar section start -->
      <nav class="navbar navbar-expand-lg navbar-light font-lemon" style="letter-spacing: 2px;">
        <button class="navbar-toggler  ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>       
    <div class="collapse navbar-collapse bg-dark" id="navbarSupportedContent">
           <div class="container-fluid ">
              <div class="row">
                <div class="col-lg-2 col-md-3 sidebar fixed-top bg-dark">
                  <div class="d-flex flex-row border-bottom">
                  <a href="logo/booklogo.png" class="py-3 mr-3 mt-3" ><img src="logo/booklogo.png" alt="" style="width: 50px;height: 40px;"></a>
                 <h3 class="text-white py-3 mt-3 ">Admin</h3>
                  </div>
                
                  <ul class="navbar-nav flex-column">
                    <li class="nav-item my-1"><a href="index.php" class="nav-link text-white sidebar-link">
                      <i class="fas fa-home mr-3"></i>Home</a></li>
                    <li class="nav-item my-1"><a href="member_info.php" class="nav-link text-white sidebar-link">
                      <i class="fas fa-users mr-3"></i>Member  Info</a></li>
                    <li class="nav-item my-1"><a href="add_book.php" class="nav-link text-white sidebar-link">
                      <i class="fas fa-plus mr-3"></i>Add Book</a></li>
                    <li class="nav-item my-1"><a href="view_book.php" class="nav-link text-white sidebar-link">
                      <i class="fas  fa-book mr-3"></i>Display Book</a></li>
                    <li class="nav-item my-1"><a href="issue_book.php" class="nav-link text-white sidebar-link">
                      <i class="fas fa-check-square mr-3"></i>Issue Book</a></li>
                    <li class="nav-item my-1"><a href="Return-Renew.php" class="nav-link text-white sidebar-link">
                      <i class="fas fa-undo-alt mr-3"></i>Return Book</a></li>
                    <li class="nav-item my-1"><a href="issue_list.php" class="nav-link text-white sidebar-link">
                      <i class="fas fa-list mr-3"></i>Issue List</a></li>
                    <li class="nav-item my-1"><a href="report.php" class="nav-link text-white sidebar-link">
                      <i class="fas fa-file mr-3"></i>Report</a></li>
                  </ul>
                </div>
                <div class="col-lg-10 col-md-9 bg-dark fixed-top ml-auto top-navbar">
                    <div class="row ">
                      <div class="col-md-3  py-2 mt-1">
                        <a href="#" class="navbar-brand text-white text-uppercase">
                          Admin DashBoard
                        </a>
                      </div>
                      <div class="col-md-5 py-2 mt-1">
                        
                      </div>
                      <div class="col-md-4 py-2 mt-1">
                        <ul class="navbar-nav">
                          
                          
                          <li class="nav-item ml-md-auto icon-parent" data-toggle="modal" data-target="#sign-out">
                            <a href="#" class="nav-link">
                               <i class="fas fa-sign-out-alt text-danger fa-lg"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                </div>
                <div class="modal font-lemon" id="sign-out">
      <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-header"> 
            <h5>Want To Log Out ?</h5>    
            <button class="close" type="button" data-dismiss="modal">&times;</button>       
          </div>
          <div class="modal-footer">               
            <a href="../login.php">
              <button class="btn btn-outline-danger">Log Out</button>
            </a>         
          </div>
        </div>
      </div>
   </div>
              </div>
            </div>
      </div>
  </nav>
      <!-- sidebar section end -->

  







